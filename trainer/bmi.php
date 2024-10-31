<?php include('header.php'); ?>

<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="result">
      </div>
      <?php echo (isset($_POST['save'])) ? save_bmi($_POST) : '';  ?>
      <?php $customer_id = $_GET['id'];  ?>
      <div class="container-fluid" id="content">
        <form method="post">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0"><i class="fa fa-edit"></i> BMI

                <a href="my_clients.php" class="btn btn-dark" style="float:right">Back</a>
              </h1>
            </div><!-- /.col -->

            <div class="col-sm-12">
              <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                <thead>
                  <tr>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Progress</th>
                    <th>BMI</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach (
                    get_list("SELECT *,
    LAG(weight) OVER (ORDER BY id) AS previous_value_weight,
    weight - LAG(weight) OVER (ORDER BY id) AS difference_weight from  tbl_bmi_history where customer_id ='$customer_id' order by created_date desc") as $res
                  ) { ?>
                    <tr>
                      <td><?php echo $res['height']; ?></td>
                      <td><?php echo $res['weight']; ?></td>
                      <td><?php echo $res['difference_weight'] ?? 0; ?></td>
                      <td><?php echo $res['result']; ?></td>
                      <td> <?php echo date_format(date_create($res['created_date']), "D, d M Y"); ?></td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div><!-- /.row -->
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