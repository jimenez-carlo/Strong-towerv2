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
        $required_fields = array('name', 'monthly', 'description');
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

        $branch_id = isset($branch) ? $branch : $_SESSION['user']->branch_id;
        $check_equipement_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_plan b where b.name ='$name' and id <> $id  and b.deleted_flag = 0 and b.branch_id = '$branch_id' limit 1");

        if (!empty($check_equipement_name->res)) {
          $_SESSION['error']['equipement'] = true;
          return message_error("Workout Name Already In-use!");
        }

        query("UPDATE tbl_plan set `name` = '$name', `description` = '$description',`monthly`='$monthly',`branch_id` = '$branch_id' where id = $id");
        return message_success("Workout Updated Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update($_POST) : '';  ?>
      <?php $plan = get_one("select * from tbl_plan where id =" . $_GET['id']); ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> Edit Plan #<?= $plan->id ?>
              <a href="membership_plans.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $plan->id ?>">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Membership Plan Details
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">

                    <?php if ($_SESSION['user']->access_id == 1) { ?>
                      <div class="form-group">
                        <label for="">*Branch</label>
                        <select name="branch" id="" class="form-control">
                          <?php foreach (get_list("select * from tbl_branch where deleted_flag = 0") as $res) { ?>
                            <option value="<?= $res['id'] ?>" <?= isset($_POST['branch']) && $_POST['branch'] == $res['id'] ? 'selected' : '' ?>><?= $res['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    <?php } ?>
                    <div class="form-group">
                      <label for="">*Plan Name</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['name']) ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Plan Name" value="<?= isset($_POST['name']) ? $_POST['name'] : $plan->name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Plan Monthly Price</label>
                      <input type="number" class="form-control <?= isset($_SESSION['error']['monthly']) ? 'is-invalid' : '' ?>" id="monthly" name="monthly" placeholder="Plan Monthly Price" value="<?= isset($_POST['monthly']) ? $_POST['monthly'] : $plan->per_month ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Plan Description</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Plan Description"><?= isset($_POST['description']) ? $_POST['description'] : $plan->description ?></textarea>
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