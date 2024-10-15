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
      function delete_user($id)
      {
        query("UPDATE tbl_client_plan set `deleted_flag` = 1 where id = $id");
        return message_success("Workout Deleted Successfully!");
      }
      ?>
      <?php echo (isset($_POST['delete'])) ? delete_user($_POST['delete']) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-users"></i> Client Plans</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
              <thead>
                <tr>
                  <!-- <th>Plan ID#</th> -->
                  <th>Plan</th>
                  <th>Status</th>
                  <th>Branch</th>
                  <th>Client Name</th>
                  <th>Trainer Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Contact</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $where = in_array($_SESSION['user']->access_id, array(2, 3, 4)) ? " and u.branch_id = '" . $_SESSION['user']->branch_id . "'" : ""; ?>
                <?php foreach (get_list("select tp.name as 'plan',tc.status,concat(b.name ,' - ', c.name, ' - ', bb.name) as `branch`,g.name as `gender`,UPPER(a.name) as 'access',ui.*,u.*,ui2.first_name as `t_first_name`,ui2.middle_name as `t_middle_name`, ui2.last_name as `t_last_name`,tc.id, ui2.id as `trainer_id` from tbl_client_plan tc inner join tbl_user u on u.id = tc.client_id inner join tbl_user_info ui on ui.id = u.id inner join tbl_access a on a.id = u.access_id inner join tbl_gender g on g.id = ui.gender_id inner join tbl_branch b on b.id = u.branch_id inner join tbl_plan tp on tp.id = tc.plan_id  left join tbl_user_info ui2 on ui2.id = tc.trainer_id left join tbl_barangay bb on bb.id = b.barangay left join tbl_city c on c.id = b.city where u.access_id = 4 and tc.deleted_flag = 0 $where") as $res) { ?>
                  <!-- <td><?php echo $res['id']; ?></td> -->
                  <td><?php echo strtoupper($res['plan']); ?></td>
                  <td><?php echo strtoupper($res['status'] ?? 'UNPAID'); ?></td>
                  <td><?php echo ucfirst($res['branch']); ?></td>
                  <td><?php echo ucwords($res['first_name'] . ' ' . ($res['middle_name'][0] ?? '') . '. ' . $res['last_name']); ?></td>
                  <td><?php echo ucwords(!empty($res['trainer_id']) ? $res['t_first_name'] . ' ' . $res['t_middle_name'][0] . '. ' . $res['t_last_name'] : 'NO TRAINER'); ?></td>
                  <td><?php echo $res['email']; ?></td>
                  <td><?php echo strtoupper($res['gender']); ?></td>
                  <td><?php echo $res['contact_no']; ?></td>
                  <?php if (in_array($_SESSION['user']->access_id, array(1, 2))) { ?>
                    <td style="display: flex;">
                      <form method="post" onsubmit="return confirm('Are You Sure?');">
                        <?php if ($_SESSION['user']->access_id == 2 || $_SESSION['user']->access_id == 1) { ?>
                          <a href="edit_client_plan.php?id=<?= $res['id']; ?>" class="btn btn-sm btn-dark"> Edit <i class="fa fa-edit"></i> </a>
                        <?php } ?>
                        <?php if ($_SESSION['user']->access_id == 1) { ?>
                          <a href="view_my_client.php?id=<?= $res['id']; ?>" class="btn btn-sm btn-dark"> View <i class="fa fa-eye"></i> </a>
                        <?php } ?>
                        <button type="submit" class="btn btn-sm btn-danger" name="delete" value="<?php echo $res['id']; ?>"> Delete <i class="fa fa-trash"></i> </button>
                      </form>
                    </td>
                  <?php } else { ?>
                    <td>
                      <a href="view_my_client.php?id=<?= $res['id']; ?>" class="btn btn-sm btn-dark"> View <i class="fa fa-eye"></i> </a>
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
      <?php if (in_array($_SESSION['user']->access_id, array(2))) { ?> {
          className: 'btn btn-sm btn-dark',
          text: '<i class="fa fa-plus"></i> Add Client Plan',
          action: function(e, dt, node, config) {
            window.location = 'create_client_plan.php';
          }
        }
      ]
  <?php } ?>
  });
</script>