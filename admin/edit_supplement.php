<?php include('header.php'); ?>
<?php $supplement = get_one("select * from tbl_supplements where id =" . $_GET['id']) ?>
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
        $required_fields = array('supplement', 'qty', 'price');
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

        $check_supplement_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_supplements b where b.name ='$supplement' and id <> $id  and deleted_flag = 0 limit 1");

        if (!empty($check_supplement_name->res)) {
          $_SESSION['error']['supplement'] = true;
          return message_error("Supplement Name Already In-use!");
        }

        $image_name = get_one("select image from tbl_supplements where id = '$id' limit 1")->image;
        if ($_FILES['image']['error'] == 0) {
          $image_name = 'image_' . date('YmdHis') . '.jpeg';
          move_uploaded_file($_FILES["image"]["tmp_name"],   '../supplements/' . $image_name);
        }

        query("UPDATE tbl_supplements set `name` = '$supplement',`qty`='$qty',`price`='$price', `description` = '$description',`image`='$image_name' where id = $id");
        return message_success("Supplement Updated Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update(array_merge($_POST, $_FILES)) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> Edit Supplement #<?= $supplement->id ?> </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $supplement->id ?>">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Supplement Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Image</label>
                      <img src="../supplements/<?= $supplement->image ?>" alt="" style="width:200px;height:200px;align-self: center;" id="preview">
                      <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <div class="form-group">
                      <label for="">*Supplement Name</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['supplement']) ? 'is-invalid' : '' ?>" id="supplement" name="supplement" placeholder="Supplement Name" value="<?= isset($_POST['service']) ? $_POST['service'] : $supplement->name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Supplement Price</label>
                      <input type="number" class="form-control <?= isset($_SESSION['error']['price']) ? 'is-invalid' : '' ?>" id="price" name="price" placeholder="Supplement Price" value="<?= isset($_POST['price']) ? $_POST['price'] : $supplement->price ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Supplement Qty</label>
                      <input type="number" class="form-control <?= isset($_SESSION['error']['qty']) ? 'is-invalid' : '' ?>" id="qty" name="qty" placeholder="Supplement Qty" value="<?= isset($_POST['qty']) ? $_POST['qty'] : $supplement->qty ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Supplement Description</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Supplement Description"><?= isset($_POST['description']) ? $_POST['description'] : $supplement->name ?></textarea>
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
        preview.src = '../supplements/default.png';
      }
    }
  </script>
</div>
<?php include('footer.php'); ?>