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
        $required_fields = array('name', 'description');
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

        $check_branch_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_branch b where b.name ='$name' and id <> $id  and deleted_flag = 0 limit 1");

        if (!empty($check_branch_name->res)) {
          $_SESSION['error']['name'] = true;
          return message_error("Branch Name Already In-use!");
        }

        query("UPDATE tbl_branch set `name` = '$name', `description` = '$description' where id = $id");
        return message_success("Branch Updated Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update($_POST) : '';  ?>
      <?php $branch = get_one("select * from tbl_branch where id =" . $_GET['id']) ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> Edit Branch #<?= $branch->id ?> </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $branch->id ?>">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Branch Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">*Branch Name</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['name']) ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Branch Name" value="<?= isset($_POST['service']) ? $_POST['service'] : $branch->name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Branch Description</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Branch Description"><?= isset($_POST['description']) ? $_POST['description'] : $branch->description ?></textarea>
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