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
        $required_fields = array('name', 'monthly', 'session', 'description');
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

        $check_workout_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_plan b where b.name ='$name' and deleted_flag = 0 limit 1");

        if (!empty($check_workout_name->res)) {
          $_SESSION['error']['name'] = true;
          return message_error("Membership Plan Name Already In-use!");
        }

        query("INSERT INTO tbl_plan (`name`,`per_month`,`per_session`,`description`) VALUES('$name', '$monthly','$session','$description')");
        unset($_POST);
        return message_success("Membership Plan Created Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['create'])) ? create(array_merge($_POST, $_FILES)) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-clipboard"></i> Create Membership Plan</h1>
          </div><!-- /.col -->
        </div>
        <form method="post" enctype="multipart/form-data">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Membership Plan Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">*Plan Name</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['name']) ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Plan Name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Plan Session Price</label>
                      <input type="number" class="form-control <?= isset($_SESSION['error']['session']) ? 'is-invalid' : '' ?>" id="session" name="session" placeholder="Plan Session Price" value="<?= isset($_POST['session']) ? $_POST['session'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Plan Monthly Price</label>
                      <input type="number" class="form-control <?= isset($_SESSION['error']['monthly']) ? 'is-invalid' : '' ?>" id="monthly" name="monthly" placeholder="Plan Monthly Price" value="<?= isset($_POST['monthly']) ? $_POST['monthly'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Plan Description</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Plan Description"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-dark float-right" name="create"><i class="fa fa-save"></i> New Workout</button>
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