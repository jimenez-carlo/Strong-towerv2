<?php include('header.php'); ?>
<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    width: 40%;
  }

  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
  }

  .container {
    padding: 2px 16px;
    margin-top: 50px;
  }
</style>

<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="result">
      </div>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-home"></i> Home</h1>

            
</section>
  <section class="container mb-5">
    <div class="row">
      <?php foreach (get_list("SELECT * from tbl_services where  deleted_flag = 0 limit 4") as $res) { ?>

        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="../services/<?= $res['image'] ?>" class="card-img-top" alt="..." style="height:286px;width:286px;object-fit:contain">
            <div class="card-body">
              <h5 class="card-title"><?= $res['name'] ?></h5>
     
            </div>
    
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
          </div><!-- /.col -->
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>



<?php include('footer.php'); ?>