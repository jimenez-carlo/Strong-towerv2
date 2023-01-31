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
      function pay($data)
      {
        extract($data);
        $approver = $_SESSION['user']->id;
        query("UPDATE tbl_invoice set status_id = 3, member_id = '$approver' where id = '$pay'");
        return message_success("Order Paid!");
      }
      function reject($data)
      {
        extract($data);
        $approver = $_SESSION['user']->id;
        query("UPDATE tbl_invoice set status_id = 4, member_id = '$approver' where id = '$reject'");
        return message_success("Order Rejected!");
      }


      ?>

      <?php echo (isset($_POST['pay'])) ? pay($_POST) : '';  ?>
      <?php echo (isset($_POST['reject'])) ? reject($_POST) : '';  ?>
      <?php $info = get_one("select status_id,customer_id  from tbl_invoice where id = " . $_GET['id']); ?>
      <?php $user = get_one("SELECT * from tbl_user_info where id = " . $info->customer_id); ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-shopping-cart"></i> Order #<?= $_GET['id'] ?></h1>
          </div><!-- /.col -->

          <div class="col-sm-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Order Details</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Supplement name</th>
                      <th>Qty</th>
                      <th>Price</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php $id = $_GET['id'] ?>
                    <?php foreach (get_list("SELECT s.*,i.qty,i.id as transaction_id FROM tbl_transaction_items i inner join tbl_supplements s on s.id = i.supplement_id where i.customer_id = '4' and invoice_id = $id") as $res) { ?>
                      <tr>
                        <td><img src="../supplements/<?php echo $res['image']; ?>" style="width:100px;height:100px;object-fit:contain"></td>
                        <td><?php echo ucfirst($res['name']); ?></td>
                        <td class="text-right"><?= $res['qty'] ?></td>
                        <td class="text-right"><?php echo number_format($res['price'] * $res['qty'], 2); ?></td>


                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">*First Name</label>
                      <input type="text" disabled class="form-control <?= isset($_SESSION['error']['service']) ? 'is-invalid' : '' ?>" id="equipement" name="equipement" placeholder="Equipement Name" value="<?= $user->first_name ?>">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">*Middle Name</label>
                      <input type="text" disabled class="form-control <?= isset($_SESSION['error']['service']) ? 'is-invalid' : '' ?>" id="equipement" name="equipement" placeholder="Equipement Name" value="<?= $user->middle_name ?>">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">*Last Name</label>
                      <input type="text" disabled class="form-control <?= isset($_SESSION['error']['service']) ? 'is-invalid' : '' ?>" id="equipement" name="equipement" placeholder="Equipement Name" value="<?= $user->last_name ?>">
                    </div>
                  </div>
                </div>



                <div class="form-group">
                  <form method="post" onsubmit="return confirm('Are You Sure?');">
                    <button type="submit" class="btn btn-sm btn-dark" name="pay" <?= ($info->status_id != 2) ? 'disabled' : "" ?> value="<?= $_GET['id'] ?>">Pay</button>
                    <button type="submit" class="btn btn-sm btn-dark" name="reject" <?= ($info->status_id != 2) ? 'disabled' : "" ?> value="<?= $_GET['id'] ?>">Reject</button>
                  </form>
                </div>
              </div>
            </div>
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

</script>