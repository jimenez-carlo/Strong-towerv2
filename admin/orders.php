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
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-box"></i> Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
              <thead>
                <tr>
                  <th>Invoice</th>
                  <th>Status</th>
                  <th>Customer</th>
                  <th>Ordered Date</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach (get_list("select i.*,s.name,concat(ui.first_name,' ',ui.last_name) as customer,b.name as branch from tbl_invoice i inner join tbl_status s on s.id = i.status_id inner join tbl_user_info  ui on ui.id = i.customer_id  inner join tbl_user u on u.id = i.customer_id  inner join tbl_branch b on b.id = u.branch_id where i.status_id <> 1 order by i.created_date desc") as $res) { ?>


                  <tr>
                    <td><?php echo ucfirst($res['invoice']); ?></td>
                    <td><?php echo ucfirst($res['name']); ?></td>
                    <td><?php echo ucfirst($res['customer']); ?></td>
                    <td><?php echo ucfirst($res['created_date']); ?></td>
                    <?php if (in_array($_SESSION['user']->access_id, array(2))) { ?>
                      <td>

                        <form method="post" onsubmit="return confirm('Are You Sure?');">
                          <a href="view_order.php?id=<?= $res['id']; ?>" class="btn btn-sm btn-dark"> View <i class="fa fa-eye"></i> </a>
                          <button type="submit" class="btn btn-sm btn-dark btn-edit" name="pay" value="<?php echo $res['id']; ?>" <?= ($res['status_id'] != 2) ? 'disabled' : "" ?>> Pay <i class="fa fa-check"></i> </button>
                          <button type="submit" class="btn btn-sm btn-danger" name="reject" value="<?php echo $res['id']; ?>" <?= ($res['status_id'] != 2) ? 'disabled' : "" ?>> Reject <i class="fa fa-times"></i> </button>
                        </form>
                      </td>
                    <?php } else { ?>
                      <td>
                        <a href="view_order.php?id=<?= $res['id']; ?>" class="btn btn-sm btn-dark"> View <i class="fa fa-eye"></i> </a>
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