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
            <h1 class="m-0"><i class="fa fa-box"></i> Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <?php foreach (get_list("select i.*,s.name from tbl_invoice i inner join tbl_status s on s.id = i.status_id where i.status_id <> 1 and i.customer_id = " . $_SESSION['user']->id . " order by created_date desc") as $res) { ?>

              <h5 class="m-0">INVOICE: <?= $res['invoice'] ?> - <?= $res['name'] ?></h5>

              <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $invoice_id = $res['id'];
                  $tmp = 0; ?>

                  <?php foreach (get_list("select t.*,s.name,s.price from tbl_transaction_items t inner join tbl_supplements s on s.id = t.supplement_id where t.invoice_id = $invoice_id") as $subres) { ?>
                    <tr>
                      <td><?php echo ucfirst($subres['name']); ?></td>
                      <td class="text-right"><?php echo $subres['qty']; ?></td>
                      <td class="text-right"><?php echo number_format($subres['price'] * $subres['qty'], 2); ?></td>
                    </tr>
                    <?php $tmp += $subres['price'] * $subres['qty'] ?>
                  <?php } ?>
                  <tr>
                    <td colspan="2" style="font-weight: bold;">Total</td>
                    <td class="text-right"><?php echo number_format($tmp, 2); ?></td>
                  </tr>
                </tbody>
              </table>
            <?php } ?>
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