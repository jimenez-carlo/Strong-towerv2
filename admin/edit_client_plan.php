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


        $tmp = get_one("SELECT id from tbl_user where client_plan_id = $id");
        $old_client_id = (isset($tmp->id)) ? $tmp->id : 0;
        if ($old_client_id != $client) {
          query("UPDATE tbl_user set plan_expiration_date = null,client_plan_id = 0 where id = '$old_client_id'");
        }
        query("UPDATE tbl_client_plan set `client_id` = '$client', `plan_id` = '$plan',`trainer_id`='$trainer',`expiration_date`='$expiration_date' where id = $id");
        query("UPDATE tbl_user set plan_expiration_date = '$expiration_date',client_plan_id = $id where id = '$client'");
        // query("DELETE FROM tbl_workout_plan where client_plan_id = $id");
        // foreach ($workout as $res) {
        //   query("INSERT INTO tbl_workout_plan (client_plan_id,workout_id) VALUES ($id,'$res')");
        // }

        return message_success("Client Plan Updated Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update($_POST) : '';  ?>
      <?php $default = get_one("SELECT * from tbl_client_plan where id = " . $_GET['id']) ?>
      <?php $client_id = $default->client_id; ?>

      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-user"></i> Edit Client Plan #<?= $default->id ?></h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" name="update_client_plan">
          <input type="hidden" name="id" value="<?= $default->id ?>">
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


                          <select id="plan" name="plan" class="form-control">
                            <?php foreach (get_list("SELECT * from tbl_plan where deleted_flag = 0") as $res) { ?>
                              <option value="<?= $res['id']; ?>" <?php echo ($default->plan_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['name'] . ' - ' . $res['per_month'] . ' per month'); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>*Client</label>
                          <select id="client" name="client" class="form-control">
                            <?php foreach (get_list("select b.name as `branch`,g.name as `gender`,UPPER(a.name) as 'access',ui.*,u.* from tbl_user u inner join tbl_user_info ui on ui.id = u.id inner join tbl_access a on a.id = u.access_id inner join tbl_gender g on g.id = ui.gender_id inner join tbl_branch b on b.id = u.branch_id where u.access_id = 4 and u.deleted_flag = 0 and (u.client_plan_id = 0 OR u.plan_expiration_date > CURDATE() OR u.id = $client_id OR u.plan_expiration_date is null)") as $res) { ?>
                              <option value="<?= $res['id']; ?>" <?php echo ($default->client_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['first_name'] . ' ' . $res['middle_name'][0] . '. ' . $res['last_name'] . ' - ' . $res['branch']); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>*Trainer</label>
                          <select id="trainer" name="trainer" class="form-control">
                            <?php foreach (get_list("select b.name as `branch`,g.name as `gender`,UPPER(a.name) as 'access',ui.*,u.* from tbl_user u inner join tbl_user_info ui on ui.id = u.id inner join tbl_access a on a.id = u.access_id inner join tbl_gender g on g.id = ui.gender_id inner join tbl_branch b on b.id = u.branch_id where u.access_id = 3 and u.deleted_flag = 0") as $res) { ?>

                              <option value="0" <?php echo ($default->trainer_id == 0) ? 'selected' : ''; ?>>NO TRAINER</option>
                              <option value="<?= $res['id']; ?>" <?php echo ($default->trainer_id == $res['id']) ? 'selected' : ''; ?>><?= strtoupper($res['first_name'] . ' ' . $res['middle_name'][0] . '. ' . $res['last_name'] . ' - ' . $res['branch']); ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>*Expiration Date</label>
                          <input type="date" class="form-control" name="expiration_date" id="expiration_date" value="<?= $default->expiration_date; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">

                      <button type="submit" class="btn btn-dark float-right" name="update"><i class="fa fa-save"></i> Update</button>
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