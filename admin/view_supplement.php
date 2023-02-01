<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <?php $supplement = get_one("select * from tbl_supplements where id =" . $_GET['id']) ?>

      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> View Supplement #<?= $supplement->id ?>
              <a href="supplements.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
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

                    </div>
                    <div class="form-group">
                      <label for="">*Supplement Name</label>
                      <input disabled type="text" class="form-control <?= isset($_SESSION['error']['supplement']) ? 'is-invalid' : '' ?>" id="supplement" name="supplement" placeholder="Supplement Name" value="<?= isset($_POST['service']) ? $_POST['service'] : $supplement->name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Supplement Price</label>
                      <input disabled type="number" class="form-control <?= isset($_SESSION['error']['price']) ? 'is-invalid' : '' ?>" id="price" name="price" placeholder="Supplement Price" value="<?= isset($_POST['price']) ? $_POST['price'] : $supplement->price ?>">
                    </div>

                    <div class="form-group">
                      <label for="">Supplement Description</label>
                      <textarea disabled class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Supplement Description"><?= isset($_POST['description']) ? $_POST['description'] : $supplement->name ?></textarea>
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