<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <?php $service = get_one("select * from tbl_services where id =" . $_GET['id']) ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> View Service #<?= $service->id ?>
              <a href="services.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $service->id ?>">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Service Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Image</label>
                      <img src="../services/<?= $service->image ?>" alt="" style="width:200px;height:200px;align-self: center;" id="preview">
                    </div>
                    <div class="form-group">
                      <label for="">*Service Name</label>
                      <input type="text" disabled class="form-control <?= isset($_SESSION['error']['service']) ? 'is-invalid' : '' ?>" id="service" name="service" placeholder="Service Name" value="<?= isset($_POST['service']) ? $_POST['service'] : $service->name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Service Description</label>
                      <textarea disabled class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Service Description"><?= isset($_POST['description']) ? $_POST['description'] : $service->description ?></textarea>
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