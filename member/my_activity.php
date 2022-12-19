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
      $date_today = date('Y-m-d');
      $member_id = $_SESSION['user']->id;
      $plan_id = $_SESSION['user']->client_plan_id;
      ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-clipboard nav-icon"></i> My Activity</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
              <thead>
                <tr>
                  <th>Date</th>
                  <!-- <th>Plan Name</th> -->
                  <th colspan="">Reps</th>
                  <th>Sets</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach (get_list("select w.reps as target_reps,w.sets as `target_sets`,p.*,DATE_FORMAT(p.date,'%W, %M %d, %Y') as `date` from tbl_progress p inner join tbl_workout w on w.id = p.workout_id where p.customer_id = '$member_id' group by p.plan_id,p.date order by p.date desc") as $res) { ?>
                  <tr>
                    <td><?= $res['date']; ?></td>
                    <td>
                      <div class="progress-group">
                        Total
                        <span class="float-right">
                          <b><?= $res['reps'] . "</b>/" . $res['target_reps'] ?></span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-danger" style="width: <?= ((int)$res['reps'] / (int)$res['target_reps']) * 100 ?>%"></div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="progress-group">
                        Total
                        <span class="float-right">
                          <b><?= $res['sets'] . "</b>/" . $res['target_sets'] ?></span>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-danger" style="width: <?= ((int)$res['sets'] / (int)$res['target_sets']) * 100 ?>%"></div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <form method="post">
                        <a href="edit_membership_plan.php?id=<?= $res['id']; ?>" class="btn btn-sm btn-dark"> Edit <i class="fa fa-edit"></i> </a>
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
    dom: '<"top"<"left-col"><"center-col"><"right-col"f>> <"row"<"col-sm-12"tr>><"row"<"col-sm-10"li><"col-sm-2"p>>'

  });
</script>