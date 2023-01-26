<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php
      remove_error();
      function create($data)
      {
        extract($data);
        $required_fields = array('plan', 'client', 'expiration_date');
        $errors = 0;
        foreach ($required_fields as $res) {
          if (empty(${$res})) {
            $_SESSION['error'][$res] = true;
            $errors++;
          }
        }

        if (!empty($errors)) {
          return message_error("Please Fill Blank Fields!");
        }

        // if (!isset($workout)) {
        //   return message_error("No Workout Assigned Yet!");
        // }

        $plan_id = insert_get_id("INSERT INTO tbl_client_plan (`client_id`,`plan_id`,`trainer_id`,`expiration_date`) VALUES('$client', '$plan','$trainer','$expiration_date')");
        query("UPDATE tbl_user set plan_expiration_date = '$expiration_date',client_plan_id ='$plan' where id = '$client'");
        // foreach ($workout as $res) {
        //   query("INSERT INTO tbl_workout_plan (client_plan_id,workout_id) VALUES ($plan_id,'$res')");
        // }
        unset($_POST);
        return message_success("Client Plan Assigned Successfully!", 'Successfull!');
      }
      ?>
      <?php $where = in_array($_SESSION['user']->access_id, array(2, 3, 4)) ? " and u.branch_id = '" . $_SESSION['user']->branch_id . "'" : ""; ?>
      <?php echo (isset($_POST['create'])) ? create(array_merge($_POST)) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-user-plus"></i> Register Client</h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Client Plan Details</h3>
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
                          <label>*Plan</label>
                          <select id="plan" name="plan" class="form-control <?= isset($_SESSION['error']['plan']) ? 'is-invalid' : '' ?>">
                            <?php foreach (get_list("select * from tbl_plan where deleted_flag = 0") as $res) { ?>
                              <option value="<?= $res['id']; ?>"><?= strtoupper($res['name'] . ' - ' . $res['per_session'] . ' per session, ' . $res['per_month'] . ' per month'); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>*Client</label>
                          <select id="client" name="client" class="form-control <?= isset($_SESSION['error']['client']) ? 'is-invalid' : '' ?>">
                            <?php foreach (get_list("select b.name as `branch`,g.name as `gender`,UPPER(a.name) as 'access',ui.*,u.* from tbl_user u inner join tbl_user_info ui on ui.id = u.id inner join tbl_access a on a.id = u.access_id inner join tbl_gender g on g.id = ui.gender_id inner join tbl_branch b on b.id = u.branch_id where u.access_id = 4 and u.deleted_flag = 0 and (u.client_plan_id = 0 OR u.client_plan_id = null OR CURDATE() > u.plan_expiration_date OR u.plan_expiration_date is null) $where") as $res) { ?>
                              <option value="<?= $res['id']; ?>"><?= strtoupper($res['first_name'] . ' ' . $res['middle_name'][0] . '. ' . $res['last_name'] . ' - ' . $res['branch']); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>*Trainer</label>
                          <select id="trainer" name="trainer" class="form-control <?= isset($_SESSION['error']['trainer']) ? 'is-invalid' : '' ?>">
                            <option value="0">NO TRAINER</option>
                            <?php foreach (get_list("select b.name as `branch`,g.name as `gender`,UPPER(a.name) as 'access',ui.*,u.* from tbl_user u inner join tbl_user_info ui on ui.id = u.id inner join tbl_access a on a.id = u.access_id inner join tbl_gender g on g.id = ui.gender_id inner join tbl_branch b on b.id = u.branch_id where u.access_id = 3 and u.deleted_flag = 0 $where") as $res) { ?>
                              <option value="<?= $res['id']; ?>"><?= strtoupper($res['first_name'] . ' ' . $res['middle_name'][0] . '. ' . $res['last_name'] . ' - ' . $res['branch']); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>*Expiration Date</label>
                          <input type="date" class="form-control <?= isset($_SESSION['error']['expiration_date']) ? 'is-invalid' : '' ?>" name="expiration_date" id="expiration_date" value="<?= isset($_POST['expiration_date']) ? $_POST['expiration_date'] : '' ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">

                      <button type="submit" class="btn btn-dark float-right" name="create"><i class="fa fa-save"></i> Assign Client Plan</button>
                    </div>
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
  // $(document).ready(function() {
  //   var wrapper = $("#wrapper2");
  //   var add_button = $("#add_workout");

  //   $(add_button).click(function(e) {
  //     e.preventDefault();
  //     $(wrapper).append('<tr><td><select name = "workout[]" class="form-control"><?php foreach (get_list("select * from tbl_workout where deleted_flag = 0") as $res) { ?> <option value="<?= $res['id']; ?>" > <?= strtoupper($res['name'] . ' - ' . $res['reps'] . ' Reps - ' . $res['sets'] . ' Sets - ' . $res['duration'] . ' Duration'); ?> </option><?php } ?> </select> </td><td><button type ="button" class="btn btn-dark btn-remove-workout" > Remove </button> </td></tr> ');
  //   });

  //   $(wrapper).on("click", ".btn-remove-workout", function(e) {
  //     e.preventDefault();
  //     $(this).parent().parent().parent().parent().parent().remove();
  //   })
  // });
</script>