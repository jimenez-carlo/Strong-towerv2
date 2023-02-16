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
      function add_to_cart($data)
      {
        extract($data);
        $customer_id = $_SESSION['user']->id;
        $stocks = get_one("select qty from tbl_supplements where id='$supplement_id' limit 1");
        if (!empty($stocks) && isset($stocks->qty)) {
          $qty = intval($qty);
          if ($qty > $stocks->qty) {
            return message_error("Not Enough Stocks.");
          } else {
            $draft = get_one("select id,qty from tbl_transaction_items where supplement_id = '$supplement_id' and customer_id = '$customer_id' and invoice_id is null limit 1");
            if (isset($draft->qty) && isset($draft->id) && !empty($draft->qty) && !empty($draft->id)) {
              $total_qty = intval($draft->qty) + $qty;
              $total_price = $total_qty * $price;
              $id = $draft->id;
              query("update tbl_transaction_items set qty = '$total_qty', price = '$total_price' where id = '$id'");
            } else {
              $total_price = $qty * intval($price);
              query("insert into tbl_transaction_items (price,qty,supplement_id,customer_id) VALUES ('$total_price', '$qty', '$supplement_id', '$customer_id') ");
            }
            return message_success("Supplement Added To Cart Successfully!");
          }
        } else {
          return message_error("Supplement Out Of Stock.");
        }
      }
      ?>
      <?php echo (isset($_POST['add_to_cart'])) ? add_to_cart($_POST) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-pills"></i> Supplements</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
              <thead>
                <tr>
                  <!-- <th>ID#</th> -->
                  <th>Image</th>
                  <th>Supplement name</th>
                  <th>Price</th>
                  <!-- <th>Actions</th> -->
                  <!-- <?php if (in_array($_SESSION['user']->access_id, array(1, 2))) { ?>
                    <th>Actions</th>
                  <?php } ?> -->
                </tr>
              </thead>
              <tbody>
                <?php foreach (get_list("select * from tbl_supplements where deleted_flag = 0") as $res) { ?>
                  <tr>
                    <!-- <td><?php echo $res['id']; ?></td> -->
                    <td><img src="../supplements/<?php echo $res['image']; ?>" style="width:100px;height:100px;object-fit:contain"></td>
                    <td><?php echo ucfirst($res['name']); ?></td>
                    <td class="text-right"><?php echo number_format($res['price'], 2); ?></td>
                    <!-- <td>
                      <form method="post" onsubmit="return confirm('Are You Sure?');">
                        <div class="input-group mb-3">
                          <input type="hidden" name="supplement_id" value="<?php echo $res['id'] ?>">
                          <input type="hidden" name="price" value="<?php echo $res['price'] ?>">
                          <input type="number" class="form-control rounded-0" name="qty" required max="<?php echo $res['qty'] ?>" value="1">
                          <span class="input-group-append">
                            <button type="submit" class="btn btn-dark btn-sm" name="add_to_cart">Add to Cart</button>
                          </span>
                        </div>
                      </form>
                    </td> -->
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
  $('table').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    dom: '<"top"<"left-col"B><"center-col"><"right-col"f>> <"row"<"col-sm-12"tr>><"row"<"col-sm-10"li><"col-sm-2"p>>',
    buttons: [
      <?php //if (in_array($_SESSION['user']->access_id, array(1, 2))) { 
      ?>
    ]
    <?php // } 
    ?>
  });
</script>