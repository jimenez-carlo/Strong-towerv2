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

        $branch_id = isset($branch) ? $branch : $_SESSION['user']->branch_id;
        $check_equipment_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_equipment b where b.name ='$name' and deleted_flag = 0 and b.branch_id = '$branch_id' limit 1");

        if (!empty($check_equipment_name->res)) {
          $_SESSION['error']['name'] = true;
          return message_error("Equipment Name Already In-use!");
        }


        $image_name = 'default.png';

        if ($_FILES['image']['error'] == 0) {
          $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          $image_name = 'image_' . date('YmdHis') . $ext;
          move_uploaded_file($_FILES["image"]["tmp_name"],   '../equipments/' . $image_name);
        }
        try {
          //code...
          $id = insert_get_id("INSERT INTO tbl_equipment (`name`,`description`,`image`,`enabled`,`branch_id`) VALUES('$name','$reason','$image_name','$enabled', '$branch_id')");
          query("INSERT into tbl_equipment_inventory (equipment_id) values($id)");
        } catch (\Throwable $th) {
          //throw $th;
        }
        unset($_POST);
        return message_success("Equipment Created Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['create'])) ? create(array_merge($_POST, $_FILES)) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-dumbbell"></i> Add Equipment
              <a href="equipments.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Equipment Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Image</label>
                      <img src="../equipments/default.png" alt="" style="width:200px;height:200px;align-self: center;" id="preview">
                      <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <?php if ($_SESSION['user']->access_id == 1) { ?>
                      <div class="form-group">
                        <label for="">*Branch</label>
                        <select name="branch" id="" class="form-control">
                          <?php foreach (get_list("select * from tbl_branch where deleted_flag = 0") as $res) { ?>
                            <option value="<?= $res['id'] ?>"><?= $res['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    <?php } ?>
                    <div class="form-group">
                      <label for="">*Equipment Name</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['name']) ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Equipment Name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Reason</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['reason']) ? 'is-invalid' : '' ?>" id="reason" name="reason" placeholder="reason" value="<?= isset($_POST['reason']) ? $_POST['reason'] : '' ?>">
                    </div>

                    <div class="form-group">
                      <label for="">*Equipment Description</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Equipment Description"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                      <input type="radio" name="enabled" value="1">
                      <label for="">Enabled</label>
                      <input type="radio" name="enabled" value="0">
                      <label for="">Disabled</label>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-dark float-right" name="create"><i class="fa fa-save"></i> Add Equipment</button>
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
<script>
  inputImage = document.getElementById('image');
  preview = document.getElementById('preview');
  inputImage.onchange = evt => {
    const [file] = inputImage.files
    if (file && file['type'].split('/')[0] === 'image') {
      preview.src = URL.createObjectURL(file)
    } else {
      preview.src = '../equipments/default.png';
    }
  }
</script>
<?php include('footer.php'); ?>