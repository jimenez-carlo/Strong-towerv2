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
        if (isset($workout_id)) {

          foreach ($workout_id as $key => $res) {
            query("INSERT INTO tbl_progress (customer_id,plan_id,workout_id,date,reps,sets) VALUES('$member_id', '$plan_id','$res','$date_today',$reps[$key],$sets[$key])");
          }
          return message_success("Workout Updated Successfully!", 'Successfull!');
        }
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
        $workout = get_one("select * from tbl_workout_plan where client_plan_id = $plan_id and workout_id = $id limit 1");
        query("INSERT INTO tbl_progress (customer_id,plan_id,workout_id,date,reps,sets) VALUES('$member_id', '$plan_id','$id','$date_today','$workout->reps','$workout->sets')");
        return message_success("Workout Added Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update($_POST) : '';  ?>
      <?php echo (isset($_POST['delete'])) ? delete($_POST['delete']) : '';  ?>
      <?php echo (isset($_POST['add'])) ? add($_POST['add']) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-sun nav-icon"></i> Workout Today</h1>
          </div><!-- /.col -->
          <?php
          $date_today = date('Y-m-d');
          $member_id = $_SESSION['user']->id;
          $plan_id = $_SESSION['user']->client_plan_id;
          $workout_today = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_progress b where b.`date` = '$date_today' and b.plan_id = '$plan_id' limit 1");
          $day_id = get_one("select id from tbl_workout_day where name = '" . strtolower(date('l') . "'"))->id;

          if (empty($workout_today->res)) {
            query("INSERT INTO tbl_progress (customer_id,plan_id,workout_id,reps,sets,duration,date) SELECT $member_id,$plan_id,workout_id,reps,sets,null,'$date_today' from tbl_workout_plan where     client_plan_id = $plan_id and day_id = '$day_id'");
          }
          // print_r($plan_id);

          ?>

        </div><!-- /.row -->
        <form method="post" onsubmit="return confirm('Are You Sure?');">

          <div class="col-sm-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">My Workout Today</h3>
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
                      <th>Workout</th>
                      <!-- <th style="width: 0.1%;white-space: nowrap;">Sets</th>
                      <th style="width: 0.1%;white-space: nowrap;">Reps</th> -->
                      <th style="width: 0.1%;white-space: nowrap;">Actual Sets</th>
                      <th style="width: 0.1%;white-space: nowrap;">Actual Reps</th>
                      <th style="width: 0.1%;white-space: nowrap;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php foreach (get_list("select w.*,w.id as workout_id,p.id,p.reps as `actual_reps`,p.sets as `actual_sets` from tbl_progress p  inner join tbl_workout  w on w.id = p.workout_id where p.plan_id = $plan_id and date = '$date_today' and p.customer_id = '$member_id' ") as $res) { ?>
                      <tr>
                        <td><input type="hidden" name="workout_id[<?= $res['id'] ?>]" value="<?= $res['workout_id'] ?>"> <?= ucfirst($res['name']); ?></td>
                        <!-- <td><?= $res['sets'] ?></td>
                        <td><?= $res['reps'] ?></td> -->
                        <td><input type="number" class="form-control" name="sets[<?= $res['id'] ?>]" value="<?= $res['actual_reps'] ?>" max="<?= $res['actual_reps'] ?>" disabled></td>
                        <td><input type="number" class="form-control" name="reps[<?= $res['id'] ?>]" value="<?= $res['actual_sets'] ?>" max="<?= $res['actual_sets'] ?>" disabled></td>
                        <input type="hidden" name="sets[<?= $res['id'] ?>]" value="<?= $res['actual_sets'] ?>">
                        <input type="hidden" name="reps[<?= $res['id'] ?>]" value="<?= $res['actual_reps'] ?>">
                        <td>
                          <button type="submit" class="btn btn-sm btn-dark" name="delete" value="<?= $res['id']; ?>"> <i class="fa fa-times"></i> </button>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="form-group">
                  <button type="submit" class="btn btn-dark float-right" name="update"><i class="fa fa-save"></i> Update</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Available Workout</h3>
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
                      <th>Workout</th>
                      <!-- <th>Sets</th>
                      <th>Reps</th> -->
                      <th style="width: 0.1%;white-space: nowrap;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    try {
                      //code...
                      $available_workout = get_one("SELECT group_concat(workout_id) as workout_ids from tbl_progress p where p.plan_id = $plan_id and date = '$date_today' group by p.plan_id");
                      $not_in = !empty($available_workout->workout_ids) ? implode("','", array_map('intval', explode(',', $available_workout->workout_ids))) : 0;
                    } catch (\Throwable $th) {
                      //throw $th;
                    }
                    ?>
                    <?php foreach (get_list("SELECT w.* FROM tbl_workout_plan wp inner join tbl_workout w on w.id = wp.workout_id WHERE wp.workout_id NOT IN ('" . $not_in . "') and wp.client_plan_id = '$plan_id' and wp.day_id = $day_id ") as $res) { ?>
                      <tr>
                        <td><?= ucfirst($res['name']); ?></td>
                        <!-- <td><?= $res['sets'] ?></td>
                        <td><?= $res['reps'] ?></td> -->
                        <td>
                          <button type="submit" class="btn btn-sm btn-dark" name="add" value="<?= $res['id']; ?>"><i class="fa fa-plus"></i> </button>
                        </td>
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