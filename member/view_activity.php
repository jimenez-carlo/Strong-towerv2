<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php
      remove_error();
      function update($data)
      {
        extract($data);
        $date_today = date('Y-m-d');
        $member_id = $_SESSION['user']->id;
        $plan_id = $_SESSION['user']->client_plan_id;
        query("DELETE from tbl_progress where `date` = '$date_today' and plan_id = '$plan_id'");
        foreach ($workout_id as $key => $res) {
          query("INSERT INTO tbl_progress (customer_id,plan_id,workout_id,date,reps,sets) VALUES('$member_id', '$plan_id','$res','$date_today',$reps[$key],$sets[$key])");
        }
        return message_success("Workout Updated Successfully!", 'Successfull!');
      }

      function delete($id)
      {
        query("DELETE from tbl_progress where id = $id");
        return message_success("Workout Removed Successfully!", 'Successfull!');
      }

      function add($id)
      {
        $date_today = date('Y-m-d');
        $member_id = $_SESSION['user']->id;
        $plan_id = $_SESSION['user']->client_plan_id;
        query("INSERT INTO tbl_progress (customer_id,plan_id,workout_id,date,reps,sets) VALUES('$member_id', '$plan_id','$id','$date_today',0,0)");
        return message_success("Workout Added Successfully!", 'Successfull!');
      }
      $date = $_GET['date'];

      ?>
      <?php echo (isset($_POST['update'])) ? update($_POST) : '';  ?>
      <?php echo (isset($_POST['delete'])) ? delete($_POST['delete']) : '';  ?>
      <?php echo (isset($_POST['add'])) ? add($_POST['add']) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-dumbell nav-icon"></i> <?= date_format(date_create($date), "D, M d, Y") ?>
              <a href="my_activity.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
          <?php
          $date_today = date('Y-m-d');
          $member_id = $_SESSION['user']->id;
          $plan_id = $_SESSION['user']->client_plan_id;

          ?>

        </div><!-- /.row -->
        <form method="post" onsubmit="return confirm('Are You Sure?');">

          <div class="col-sm-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Work Out Details
                </h3>
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