<?php include('header.php'); ?>

<?php
function save_bmi($data)
{
  extract($data);
  $customer_id = $_SESSION['user']->id;
  query("delete from tbl_bmi_history where customer_id = '$customer_id' and created_date >= curdate()");
  query("insert into tbl_bmi_history (customer_id,weight,height,result) values($customer_id,'$w','$h','$value')");
  return message_success("BMI Recorded");
}

$customer_id = $_SESSION['user']->id;
$a = get_one("select * from tbl_bmi_history where customer_id = '$customer_id' and created_date >= curdate()");
$disabled = !empty($a) ? true : false;
?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="result">
      </div>
      <?php echo (isset($_POST['save'])) ? save_bmi($_POST) : '';  ?>
      <div class="container-fluid" id="content">
        <form method="post">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0"><i class="fa fa-calculator"></i> BMI

              </h1>
            </div><!-- /.col -->
            <div class="col-sm-12">
              <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Information</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>*Height (inches)</label>
                        <input type="number" class="form-control " id="h" name="h" placeholder="Height" <?= $disabled ? "disabled" : "" ?>>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>*Weight (kilogram)</label>
                        <input type="number" class="form-control " id="w" name="w" placeholder="Weight" <?= $disabled ? "disabled" : "" ?>>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Result</label>
                        <input type="text" class="form-control " id="result" value="" disabled>
                        <input type="hidden" class="form-control " id="value" value="" name="value">
                      </div>
                    </div>

                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-dark float-right" name="save" <?= $disabled ? "disabled" : "" ?>><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-dark float-right mr-1" id="btn" <?= $disabled ? "disabled" : "" ?>><i class="fa fa-save"></i> Calculate</button>
                  </div>
                </div>
              </div>
            </div>

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
                  <?php $customer_id = $_SESSION['user']->id;  ?>
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
                      <td>
                        <?php echo date_format(date_create($res['created_date']), "D, d M Y"); ?>
                      </td>
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
<script>
  // https: //www.geeksforgeeks.org/design-a-bmi-calculator-using-javascript/
  window.onload = () => {
    let button = document.querySelector("#btn");

    // Function for calculating BMI
    button.addEventListener("click", calculateBMI);
  };

  function calculateBMI() {

    /* Getting input from user into height variable.
    Input is string so typecasting is necessary. */
    let height = parseInt(document
      .querySelector("#h").value);

    /* Getting input from user into weight variable. 
    Input is string so typecasting is necessary.*/
    let weight = parseInt(document
      .querySelector("#w").value);

    let result = document.querySelector("#result");
    let value = document.querySelector("#value");

    // Checking the user providing a proper
    // value or not
    if (height === "" || isNaN(height))
      result.value = "Provide a valid Height!";

    else if (weight === "" || isNaN(weight))
      result.value = "Provide a valid Weight!";

    // If both input is valid, calculate the bmi
    else {

      // Fixing upto 2 decimal places
      let bmi = (weight / ((height * height) /
        10000)).toFixed(2);

      // Dividing as per the bmi conditions
      if (bmi < 18.6) result.value =
        `Under Weight : ${bmi}`;

      else if (bmi >= 18.6 && bmi < 24.9)
        result.value =
        `Normal : ${bmi}`;

      else result.value =
        `Over Weight : ${bmi}`;

      if (bmi < 18.6) value.value =
        `Under Weight : ${bmi}`;

      else if (bmi >= 18.6 && bmi < 24.9)
        value.value =
        `Normal : ${bmi}`;

      else value.value =
        `Over Weight : ${bmi}`;
    }
  }
</script>
<?php include('footer.php'); ?>