<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php
      remove_error();
      $date = $_GET['date'];

      ?>
      <?php echo (isset($_POST['update'])) ? update($_POST) : '';  ?>
      <?php echo (isset($_POST['delete'])) ? delete($_POST['delete']) : '';  ?>
      <?php echo (isset($_POST['add'])) ? add($_POST['add']) : '';  ?>
      <?php
      $date_today = date('Y-m-d');
      $member_id = $_GET['client_id'];
      $plan_id = $_GET['plan_id'];

      ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-user"></i> View Client Plan #<?= $_GET['client_id'] ?> - <?= date_format(date_create($date), "D, M d, Y") ?> <a class="btn btn-dark btn-sm" style="float:right;margin-right:10px" href="edit_my_client.php?id=<?= $member_id ?>">Back</a></h1>

          </div><!-- /.col -->

        </div><!-- /.row -->
        <form method="post" onsubmit="return confirm('Are You Sure?');">

          <div class="col-sm-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Work Out Details</h3>
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
                      <th>Workout - Duration</th>
                      <th style="width: 0.1%;white-space: nowrap;">Target Sets</th>
                      <th style="width: 0.1%;white-space: nowrap;">Target Reps</th>
                      <th style="width: 0.1%;white-space: nowrap;">Actual Sets</th>
                      <th style="width: 0.1%;white-space: nowrap;">Actual Reps</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    foreach (get_list("select w.*,w.id as workout_id,p.id,p.reps as `actual_reps`,p.sets as `actual_sets` from tbl_progress p  inner join tbl_workout  w on w.id = p.workout_id where p.plan_id = $plan_id and date = '$date'") as $res) { ?>
                      <tr>
                        <td><input type="hidden" name="workout_id[<?= $res['id'] ?>]" value="<?= $res['workout_id'] ?>"> <?= ucfirst($res['name']) . " - " . $res['duration']; ?></td>
                        <td><?= $res['sets'] ?></td>
                        <td><?= $res['reps'] ?></td>
                        <td><?= $res['actual_sets'] ?></td>
                        <td><?= $res['actual_reps'] ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<?php include('footer.php'); ?>