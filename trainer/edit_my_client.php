<?php include('header.php'); ?>

<style>
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>
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
        $required_fields = array('plan', 'client', 'trainer', 'expiration_date');

        $errors = 0;
        try {
          foreach ($required_fields as $res) {
            if (empty(${$res})) {
              $_SESSION['error'][$res] = true;
              $errors++;
            }
          }

          if (!empty($errors)) {
            return message_error("Please Fill Blank Fields!");
          }

          if (!isset($workout)) {
            return message_error("No Workout Assigned Yet!");
          }



          $old_client_id = get_one("SELECT id from tbl_user where client_plan_id = $id")->id;
          if ($old_client_id != $client) {
            query("UPDATE tbl_user set plan_expiration_date = null,client_plan_id = 0 where id = '$old_client_id'");
          }
        } catch (\Throwable $th) {
        }
        query("UPDATE tbl_client_plan set `client_id` = '$client', `plan_id` = '$plan',`trainer_id`='$trainer',`expiration_date`='$expiration_date' where id = $id");
        query("UPDATE tbl_user set plan_expiration_date = '$expiration_date',client_plan_id = $id where id = '$client'");
        query("DELETE FROM tbl_workout_plan where client_plan_id = $id");
        foreach ($workout as $key => $res) {
          $date = $day[$key];
          $repsv = $reps[$key];
          $setsv = $sets[$key];
          // $durationv = $duration[$key];
          query("INSERT INTO tbl_workout_plan (client_plan_id,workout_id,day_id,`reps`,`sets`) VALUES ($id,'$res', $date,'$repsv','$setsv')");
        }

        return message_success("Client Workout Updated Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update($_POST) : '';  ?>
      <?php $default = get_one("SELECT *,DATE_FORMAT(created_date, '%Y-%m-%d') as created_date from tbl_client_plan where id = " . $_GET['id']) ?>
      <?php $client_id = $default->client_id; ?>

      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-user"></i> View Client Plan #<?= $default->id ?>
              <a href="my_clients.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" name="update_client_plan">
          <input type="hidden" name="id" value="<?= $default->id ?>">
          <section class="content">
            <div class="row">
              <div class="col-md-8">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Client Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>*Client Name</label>
                          <input type="hidden" name="client" value="<?= $default->client_id  ?>">
                          <select disabled id="client" name="client" class="form-control">

                            <?php foreach (get_list("select b.name as `branch`,g.name as `gender`,UPPER(a.name) as 'access',ui.*,u.* from tbl_user u inner join tbl_user_info ui on ui.id = u.id inner join tbl_access a on a.id = u.access_id inner join tbl_gender g on g.id = ui.gender_id inner join tbl_branch b on b.id = u.branch_id where u.access_id = 4 and u.deleted_flag = 0 and (u.client_plan_id = 0 OR u.plan_expiration_date > CURDATE() OR u.id = $client_id OR u.plan_expiration_date is null)") as $res) { ?>
                              <option value="<?= $res['id']; ?>" <?php echo ($default->client_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['first_name'] . ' ' . ($res['middle_name'][0] ?? '') . '. ' . $res['last_name'] . ' - ' . $res['branch']); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>*Plan</label>


                          <select disabled id="plan" name="plan" class="form-control">
                            <?php foreach (get_list("SELECT * from tbl_plan where deleted_flag = 0") as $res) { ?>
                              <option value="<?= $res['id']; ?>" <?php echo ($default->plan_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name'] . ' - ' . $res['per_session'] . ' per session, ' . $res['per_month'] . ' per month'); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>*Status</label>
                          <input disabled type="text" class="form-control" name="expiration_date" id="expiration_date" value="<?= $default->status ?? 'UNPAID'; ?>">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>*Start Date</label>
                          <input disabled type="date" class="form-control" name="expiration_date" id="expiration_date" value="<?= $default->created_date; ?>">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>*Expiration Date</label>
                          <input disabled type="date" class="form-control" name="expiration_date" id="expiration_date" value="<?= $default->expiration_date; ?>">
                        </div>
                      </div>
                    </div>


                    <div class="col-sm-12">
                      <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead>
                          <tr>
                            <th>Workout</th>
                            <th>Reps</th>
                            <th>Sets</th>
                            <!-- <th>Duration</th> -->
                            <th>Day</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody id="wrapper2">

                          <?php foreach (get_list("SELECT * from tbl_workout_plan where client_plan_id = $default->id") as $res) { ?>
                            <tr>
                              <td><select name="workout[]" class="form-control">
                                  <?php foreach (get_list("select w.*,concat(c.name, ' - ', w.name , ' - ', bp.name) as `name` from tbl_workout w inner join tbl_category c on c.id = w.category_id inner join tbl_body_part bp on bp.id = w.body_part_id where w.deleted_flag = 0") as $subres) { ?>
                                    <option value="<?= $subres['id']; ?>" <?php echo ($res['workout_id'] == $subres['id']) ? 'selected' : ''; ?>> <?= strtoupper($subres['name']); ?> </option>
                                  <?php } ?>
                                </select> </td>
                              <td style="width:50px"><input type="number" name="reps[]" class="form-control" value="<?= $res['reps'] ?>"></td>
                              <td style="width:50px"><input type="number" name="sets[]" class="form-control" value="<?= $res['sets'] ?>"></td>
                              <!-- <td style="width:50px"><input type="text" name="duration[]" class="form-control" value="<?= $res['duration'] ?>"></td> -->
                              <td><select name="day[]" class="form-control"><?php foreach (get_list("select * from tbl_workout_day ") as $subres) { ?> <option value="<?= $subres['id']; ?>" <?= ($res['day_id'] == $subres['id'] ? "selected" : "") ?>> <?= strtoupper($subres['name']); ?> </option><?php } ?> </select> </td>
                              <td><button type="button" class="btn btn-sm btn-dark btn-remove-workout"> Remove </button> <button type="button" class="btn btn-sm btn-dark btn-view"> View </button> </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>



                    <div class="form-group">
                      <button type="button" class="btn btn-sm btn-dark" id="add_workout">
                        <i class="fas fa-plus"></i> Add Workout
                      </button>
                      <input type="hidden" name="trainer" value="<?= $default->trainer_id ?>">
                      <input type="hidden" name="expiration_date" value="<?= $default->expiration_date ?>">
                      <input type="hidden" name="client" value="<?= $default->client_id ?>">
                      <input type="hidden" name="plan" value="<?= $default->plan_id ?>">
                      <button type="submit" class="btn btn-sm btn-dark float-right" name="update"><i class="fa fa-save"></i> Update</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Progress Details</h3>
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
                          <th>Date</th>
                          <!-- <th>Plan Name</th> -->
                          <!-- <th colspan="">Reps</th>
                          <th>Sets</th> -->
                          <th>Actions</th>

                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach (get_list("select p.plan_id,w.reps as target_reps,w.sets as `target_sets`,sum(p.reps) as reps,sum(p.sets) as sets,p.date as 'date_2',DATE_FORMAT(p.date,'%W, %M %d, %Y') as `date` from tbl_progress p inner join tbl_workout w on w.id = p.workout_id where p.customer_id = '$client_id' group by p.date,p.plan_id order by p.date desc") as $res) { ?>
                          <tr>
                            <td><?= $res['date']; ?></td>
                            <!-- <td>
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
                            </td> -->
                            <td>
                              <form method="post" onsubmit="return confirm('Are You Sure?');">
                                <a href="view_activity.php?client_id=<?= $_GET['id'] ?>&plan_id=<?= $res['plan_id'] ?>&date=<?= $res['date_2']; ?>" class="btn btn-sm btn-sm btn-dark"> View <i class="fa fa-eye"></i> </a>
                              </form>
                            </td>
                          </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
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
<script>
  $(document).ready(function() {
    var wrapper = $("#wrapper2");
    var add_button = $("#add_workout");

    $(add_button).click(function(e) {
      e.preventDefault();
      $(wrapper).append('<tr><td><select name = "workout[]" class="form-control"><?php foreach (get_list("select * from tbl_workout where deleted_flag = 0") as $res) { ?> <option value="<?= $res['id']; ?>" > <?= strtoupper($res['name']); ?> </option><?php } ?> </select> </td><td style="width:50px"><input type="number" name="reps[]" class="form-control"></td><td style="width:50px"><input type="number" name="sets[]" class="form-control"></td><td><select name = "day[]" class="form-control"><?php foreach (get_list("select * from tbl_workout_day") as $res) { ?> <option value="<?= $res['id']; ?>" > <?= strtoupper($res['name']); ?> </option><?php } ?> </select> </td><td><button type ="button" class="btn btn-sm btn-dark btn-remove-workout" > Remove </button> <button type="button" class="btn btn-sm btn-dark btn-view"> View </button></td></tr> ');
    });

    $(wrapper).on("click", ".btn-remove-workout", function(e) {
      e.preventDefault();
      $(this).parent().parent().remove();
    })


    $(".btn-view").on("click", function() {

      var id = $(this).parent().parent().children()[0].firstChild.value;
      window.open("view_workout.php?id=" + id, "_blank");
    });
  });
</script>