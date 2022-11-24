<?php include('header.php'); ?>

<style>
  .carousel-img {
    object-fit: fill;
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
            <h1 class="m-0 text-center">Strong Tower Gym</h1><br>
            <h5 class="m-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, ex praesentium! Numquam quis excepturi assumenda voluptatum molestiae consectetur sapiente corrupti sequi! Ipsa ex magnam quos assumenda magni minima rem vero.</h5>
            <br>
          </div>
          <div class="col-sm-6">
            <h4 class="m-0 text-center mb-2">Facilities</h4>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100 carousel-img" src="../facilities/1.jpg" alt="First slide" style="height:445px">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 carousel-img" src="../facilities/2.jpg" alt="First slide" style="height:445px">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 carousel-img" src="../facilities/3.jpg" alt="First slide" style="height:445px">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 carousel-img" src="../facilities/4.jpg" alt="First slide" style="height:445px">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 carousel-img" src="../facilities/5.jpg" alt="First slide" style="height:445px">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 carousel-img" src="../facilities/6.jpg" alt="First slide" style="height:445px">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 carousel-img" src="../facilities/7.jpg" alt="First slide" style="height:445px">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 carousel-img" src="../facilities/8.jpg" alt="First slide" style="height:445px">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 carousel-img" src="../facilities/9.jpg" alt="First slide" style="height:445px">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <h4 class="m-0 text-center mb-2">Services</h4>
            <div id="carouselExampleIndicators_2" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php $ctr = 0; ?>
                <?php foreach (get_list("SELECT * from tbl_services where deleted_flag = 0") as $res) { ?>
                  <li data-target="#carouselExampleIndicators_2" data-slide-to="<?= $ctr ?>" class="<?= ($ctr == 0) ? 'active' : '' ?>"></li>
                  <?php $ctr++; ?>
                <?php }  ?>
              </ol>
              <div class="carousel-inner">
                <?php $ctr = 0; ?>
                <?php foreach (get_list("SELECT * from tbl_services where deleted_flag = 0") as $res) { ?>
                  <div class="carousel-item <?= ($ctr == 0) ? 'active' : '' ?>">
                    <img class="d-block w-100 carousel-img" src="../services/<?= $res['image'] ?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h5><?= $res['name'] ?></h5>
                      <p><?= $res['description'] ?></p>
                    </div>
                  </div>
                  <?php $ctr++; ?>
                <?php }  ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators_2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators_2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
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