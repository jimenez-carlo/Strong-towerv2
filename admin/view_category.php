<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <?php $category = get_one("select * from tbl_category where id =" . $_GET['id']) ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> View Category #<?= $category->id ?>
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
                      <input type="text" disabled class="form-control <?= isset($_SESSION['error']['category']) ? 'is-invalid' : '' ?>" id="category" name="category" placeholder="Category Name" value="<?= isset($_POST['category']) ? $_POST['category'] : $category->name ?>">
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