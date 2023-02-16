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
        $required_fields = array('workout', 'description', 'reps', 'sets', 'duration');
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
        $check_equipement_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_workout b where b.name ='$workout' and id <> $id  and b.deleted_flag = 0 and b.branch_id = '$branch_id' limit 1");

        if (!empty($check_equipement_name->res)) {
          $_SESSION['error']['equipement'] = true;
          return message_error("Workout Name Already In-use!");
        }

        query("UPDATE tbl_workout set `name` = '$workout', `description` = '$description',category_id =  '$category',`branch_id`='$branch_id' where id = $id");
        return message_success("Workout Updated Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update($_POST) : '';  ?>
      <?php $workout = get_one("select * from tbl_workout where id =" . $_GET['id']); ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> Edit Workout #<?= $workout->id ?>
              <a href="workouts.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $workout->id ?>">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Workout Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">

                    <div class="form-group">
                      <label for="">*Category</label>

                      <select id="category" name="category" class="form-control <?= isset($_SESSION['error']['category']) ? 'is-invalid' : '' ?>">
                        <?php
                        $branch = $_SESSION['user']->branch_id == 1 ? " " : " and branch_id =" . $_SESSION['user']->branch_id;
                        ?>
                        <?php foreach (get_list("select * from tbl_category where deleted_flag = 0 $branch") as $res) { ?>
                          <option value="<?= $res['id']; ?>" <?= ($workout->category_id == $res['id']) ? 'selected' : ''; ?>><?= $res['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">*Workout Name</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['name']) ? 'is-invalid' : '' ?>" id="workout" name="workout" placeholder="Workout Name" value="<?= isset($_POST['name']) ? $_POST['name'] : $workout->name ?>">
                    </div>

                    <div class="form-group">
                      <label for="">*Workout Description</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Workout Description"><?= isset($_POST['description']) ? $_POST['description'] : $workout->description ?></textarea>
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