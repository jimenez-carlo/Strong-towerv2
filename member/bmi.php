<?php include('header.php'); ?>
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
            <h1 class="m-0"><i class="fa fa-calculator"></i> BMI</h1>
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
                      <label>*Height (in cm)</label>
                      <input type="number" class="form-control " id="h" name="h" placeholder="Height">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>*Weight (in kg)</label>
                      <input type="number" class="form-control " id="w" name="w" placeholder="Weight">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Result</label>
                      <input type="text" class="form-control " id="result" value="" disabled>
                    </div>
                  </div>

                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-dark float-right" id="btn"><i class="fa fa-save"></i> Calculate</button>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
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
    }
  }
</script>
<?php include('footer.php'); ?>