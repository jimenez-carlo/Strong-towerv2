<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <?php $Equipment = get_one("select * from tbl_equipment where id =" . $_GET['id']); ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> View Equipment #<?= $equipement->id ?>
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
                      <img src="../equipments/<?= $equipement->image ?>" alt="" style="width:200px;height:200px;align-self: center;" id="preview">
                    </div>
                    <div class="form-group">
                      <label for="">*Equipment Name</label>
                      <input disabled type="text" class="form-control <?= isset($_SESSION['error']['service']) ? 'is-invalid' : '' ?>" id="equipement" name="equipement" placeholder="Equipment Name" value="<?= isset($_POST['equipement']) ? $_POST['equipement'] : $equipement->name ?>">
                    </div>

                    <div class="form-group">
                      <label for="">*Equipment Description</label>
                      <textarea disabled class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Equipment Description"><?= isset($_POST['description']) ? $_POST['description'] : $equipement->description ?></textarea>
                    </div>
                    <div class="form-group">
                      <input disabled type="radio" name="enabled" value="1" <?= ($equipement->enabled == 1) ? 'checked="checked"' : '' ?>>
                      <label for="">Enabled</label>
                      <input disabled type="radio" name="enabled" value="0" <?= ($equipement->enabled == 0) ? 'checked="checked"' : '' ?>>
                      <label for="">Disabled</label>
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