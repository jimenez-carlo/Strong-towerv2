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
        $required_fields = array('equipement', 'description');
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
        $check_equipement_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_equipment b where b.name ='$equipement' and id <> $id  and b.deleted_flag = 0  and b.branch_id = '$branch_id' limit 1");

        if (!empty($check_equipement_name->res)) {
          $_SESSION['error']['equipement'] = true;
          return message_error("Equipement Name Already In-use!");
        }

        $image_name = get_one("select image from tbl_equipment where id = '$id' limit 1")->image;
        if ($_FILES['image']['error'] == 0) {
          $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          $image_name = 'image_' . date('YmdHis') . $ext;
          move_uploaded_file($_FILES["image"]["tmp_name"],   '../equipments/' . $image_name);
        }

        query("UPDATE tbl_equipment set `name` = '$equipement', `description` = '$description',`image`='$image_name',`enabled`='$enabled',`branch_id`='$branch_id' where id = $id");
        return message_success("Equipement Updated Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update(array_merge($_POST, $_FILES)) : '';  ?>
      <?php $equipement = get_one("select * from tbl_equipment where id =" . $_GET['id']); ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> Edit Equipment
              <a href="equipments.php" class="btn btn-dark" style="float:right">Back</a>

            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $equipement->id ?>">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Equipment Details
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Image</label>
                      <img src="../equipments/<?= $equipement->image ?>" alt="" style="width:200px;height:200px;align-self: center;" id="preview">
                      <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <?php if ($_SESSION['user']->access_id == 1) { ?>
                      <div class="form-group">
                        <label for="">*Branch</label>
                        <select name="branch" id="" class="form-control">
                          <?php foreach (get_list("select b.*,concat(UPPER(b.name) ,' - ', c.name, ' - ', bb.name) as `name` from tbl_branch b left join tbl_barangay bb on bb.id = b.barangay left join tbl_city c on c.id = b.city where b.deleted_flag = 0") as $res) { ?>
                            <option value="<?= $res['id'] ?>" <?= isset($_POST['branch']) && $_POST['branch'] == $res['id'] ? 'selected' : '' ?>><?= $res['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    <?php } ?>
                    <div class="form-group">
                      <label for="">*Equipement Name</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['service']) ? 'is-invalid' : '' ?>" id="equipement" name="equipement" placeholder="Equipement Name" value="<?= isset($_POST['equipement']) ? $_POST['equipement'] : $equipement->name ?>">
                    </div>

                    <div class="form-group">
                      <label for="">*Equipement Description</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Equipement Description"><?= isset($_POST['description']) ? $_POST['description'] : $equipement->description ?></textarea>
                    </div>
                    <div class="form-group">
                      <input type="radio" name="enabled" value="1" <?= ($equipement->enabled == 1) ? 'checked="checked"' : '' ?>>
                      <label for="">Enabled</label>
                      <input type="radio" name="enabled" value="0" <?= ($equipement->enabled == 0) ? 'checked="checked"' : '' ?>>
                      <label for="">Disabled</label>
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
</div>
<?php include('footer.php'); ?>