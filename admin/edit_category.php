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
        $required_fields = array('category');
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
        $check_category_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_category b where b.name ='$category' and id <> $id  and deleted_flag = 0 and branch_id = '$branch_id' limit 1");

        if (!empty($check_category_name->res)) {
          $_SESSION['error']['category'] = true;
          return message_error("Category Name Already In-use!");
        }


        query("UPDATE tbl_category set `name` = '$category',`branch_id`= '$branch_id' where id = $id");
        return message_success("Category Updated Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update(array_merge($_POST, $_FILES)) : '';  ?>
      <?php $category = get_one("select * from tbl_category where id =" . $_GET['id']) ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> Edit Category #<?= $category->id ?>
              <a href="category.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $category->id ?>">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Category Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">

                    <div class="form-group">
                      <label for="">*Category Name</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['category']) ? 'is-invalid' : '' ?>" id="category" name="category" placeholder="Category Name" value="<?= isset($_POST['category']) ? $_POST['category'] : $category->name ?>">
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
        preview.src = '../service/default.png';
      }
    }
  </script>
</div>
<?php include('footer.php'); ?>