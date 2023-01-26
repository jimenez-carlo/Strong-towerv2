<?php include('header.php'); ?>
<link rel="stylesheet" href="../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php
      $customer_id = $_SESSION['user']->id;
      function update_cart($data)
      {
        extract($data);
        $stocks = get_one("select qty from tbl_supplements where id='$supplement_id' limit 1");
        if (!empty($stocks) && isset($stocks->qty)) {
          $qty = intval($qty);
          if ($qty > $stocks->qty) {
            return message_error("Not Enough Stocks.");
          } else {
            $total_price = $qty * $price;
            query("update tbl_transaction_items set qty = '$qty', price = '$total_price' where id = '$transaction_id'");
            return message_success("Cart Updated Successfully!");
          }
        } else {
          return message_error("Supplement Out Of Stock.");
        }
      }
      function delete($data)
      {
        extract($data);
        query("delete from tbl_transaction_items where id = $transaction_id");
        return message_success("Supplement Removed!");
      }

      function checkout()
      {
        $customer_id = $_SESSION['user']->id;
        $invoice = date('dmyhis');
        $id = insert_get_id("insert into tbl_invoice (invoice,status_id, customer_id) values ('$invoice',1,'$customer_id')");
        query("update tbl_transaction_items set invoice_id = '$id' where customer_id = '$customer_id' and invoice_id is null ");
        return message_success("Cart Checkout Succesfully!");
      }
      $checkout_available = get_one("select count(id)  as id from tbl_transaction_items where invoice_id is null and customer_id = '$customer_id' group by invoice_id");
      ?>
      <?php echo (isset($_POST['update_cart'])) ? update_cart($_POST) : '';  ?>
      <?php echo (isset($_POST['delete'])) ? delete($_POST) : '';  ?>
      <?php echo (isset($_POST['checkout'])) ? checkout() : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-check"></i> Cart</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
              <thead>
                <tr>
                  <th></th>
                  <th>Supplement name</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Actions</th>
                  <?php if (in_array($_SESSION['user']->access_id, array(1, 2))) { ?>
                    <th>Actions</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach (get_list("SELECT s.*,i.qty,i.id as transaction_id FROM tbl_transaction_items i inner join tbl_supplements s on s.id = i.supplement_id where i.customer_id = '4' and invoice_id is null") as $res) { ?>
                  <tr>
                    <td><img src="../supplements/<?php echo $res['image']; ?>" style="width:100px;height:100px;object-fit:contain"></td>
                    <td><?php echo ucfirst($res['name']); ?></td>
                    <td class="text-right"><?= $res['qty'] ?></td>
                    <td class="text-right"><?php echo number_format($res['price'] * $res['qty'], 2); ?></td>
                    <td>
                      <form method="post" onsubmit="return confirm('Are You Sure?');">
                        <div class="input-group mb-3">
                          <input type="hidden" name="supplement_id" value="<?php echo $res['id'] ?>">
                          <input type="hidden" name="transaction_id" value="<?php echo $res['transaction_id'] ?>">
                          <input type="hidden" name="price" value="<?php echo $res['price'] ?>">
                          <input type="number" class="form-control rounded-0" name="qty" required min="1" value="<?php echo $res['qty'] ?>">
                          <span class="input-group-append">
                            <button type="submit" class="btn btn-dark btn-sm" name="update_cart">Update</button>
                            <button type="submit" class="btn btn-dark btn-sm" name="delete">Delete</button>
                          </span>
                        </div>

                      </form>
                    </td>
                    <?php if (in_array($_SESSION['user']->access_id, array(1, 2))) { ?>
                      <td>
                        <form method="post" onsubmit="return confirm('Are You Sure?');">
                          <a href="edit_supplement.php?id=<?= $res['id']; ?>" class="btn btn-sm btn-dark"> Edit <i class="fa fa-edit"></i> </a>
                          <button type="button" class="btn btn-sm btn-dark btn-edit" name="admin/supplement_edit" value="<?php echo $res['id']; ?>"> Edit <i class="fa fa-edit"></i> </button>
                          <button type="submit" class="btn btn-sm btn-dark" name="delete" value="<?php echo $res['id']; ?>"> Delete <i class="fa fa-trash"></i> </button>
                        </form>
                      </td>
                    <?php } ?>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>

          <form method="post" onsubmit="return confirm('Are You Sure?');">
            <button type="submit" class="btn btn-dark btn-sm" name="checkout" <?= (isset($checkout_available->id)) ? '' : 'disabled'  ?>>Checkout</button>
          </form>
        </div>

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<?php include('footer.php'); ?>
<script src="../adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/jszip/jszip.min.js"></script>
<script src="../adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>

</script>