<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php echo (isset($_POST['update'])) ? update($_POST) : '';  ?>
      <?php $plan = get_one("select * from tbl_plan where id =" . $_GET['id']); ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> View Plan #<?= $plan->id ?> </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" enctype="multipart/form-data">
          <input disabled type="hidden" name="id" value="<?= $plan->id ?>">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Membership Plan Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">

                    <div class="form-group">
                      <label for="">*Plan Name</label>
                      <input disabled type="text" class="form-control <?= isset($_SESSION['error']['name']) ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Plan Name" value="<?= isset($_POST['name']) ? $_POST['name'] : $plan->name ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Plan Session Price</label>
                      <input disabled type="number" class="form-control <?= isset($_SESSION['error']['session']) ? 'is-invalid' : '' ?>" id="session" name="session" placeholder="Plan Session Price" value="<?= isset($_POST['session']) ? $_POST['session'] : $plan->per_session ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Plan Monthly Price</label>
                      <input disabled type="number" class="form-control <?= isset($_SESSION['error']['monthly']) ? 'is-invalid' : '' ?>" id="monthly" name="monthly" placeholder="Plan Monthly Price" value="<?= isset($_POST['monthly']) ? $_POST['monthly'] : $plan->per_month ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Plan Description</label>
                      <textarea disabled class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Plan Description"><?= isset($_POST['description']) ? $_POST['description'] : $plan->description ?></textarea>
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