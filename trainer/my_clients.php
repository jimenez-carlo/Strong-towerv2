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
      function verify($id)
      {
        query("UPDATE tbl_user set `verified` = 1 where id = $id");
        return message_success("Client Verified Successfully!");
      }
      function delete_user($id)
      {
        query("UPDATE tbl_user set `deleted_flag` = 1 where id = $id");
        return message_success("Client Deleted Successfully!");
      }
      ?>
      <?php echo (isset($_POST['verify'])) ? verify($_POST['verify']) : '';  ?>
      <?php echo (isset($_POST['delete'])) ? delete_user($_POST['delete']) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-users"></i> Clients</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
              <thead>
                <tr>
                  <th>ID#</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Contact</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $where = in_array($_SESSION['user']->access_id, array(2, 3, 4)) ? " and u.branch_id = '" . $_SESSION['user']->branch_id . "'" : "";
                $trainer_id = $_SESSION['user']->id;
                $sql = "select b.name as `branch`,g.name as `gender`,UPPER(a.name) as 'access',ui.*,u.*,tcp.id from tbl_user u inner join tbl_user_info ui on ui.id = u.id inner join tbl_access a on a.id = u.access_id inner join tbl_gender g on g.id = ui.gender_id inner join tbl_branch b on b.id = u.branch_id inner join tbl_client_plan tcp on tcp.client_id = u.id  where u.access_id = 4 and u.deleted_flag = 0 and tcp.trainer_id = '$trainer_id' $where";
                ?>
                <?php foreach (get_list($sql) as $res) { ?>
                  <tr>
                    <td><?php echo $res['id']; ?></td>
                    <td><?php echo $res['username']; ?></td>
                    <td><?php echo $res['email']; ?></td>
                    <td><?php echo ucwords($res['first_name'] . ' ' . $res['last_name']); ?></td>
                    <td><?php echo strtoupper($res['gender']); ?></td>
                    <td><?php echo $res['contact_no']; ?></td>
                    <td>
                      <form method="post">
                        <a href="edit_my_client.php?id=<?= $res['id']; ?>" class="btn btn-sm btn-dark"> Edit <i class="fa fa-edit"></i> </a>

                      </form>
                    </td>
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
      <?php if (in_array($_SESSION['user']->access_id, array(1, 2))) { ?> {
          className: 'btn btn-sm btn-dark',
          text: '<i class="fa fa-user-plus"></i> Add Client',
          action: function(e, dt, node, config) {
            window.location = 'create_client.php';
          }
        }
      <?php } ?>
    ]
  });
</script>