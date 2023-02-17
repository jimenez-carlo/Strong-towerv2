<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,
    wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&
    display=swap" rel="stylesheet">
  <!-- Awesome fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css
    " integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous" />
  <title>Strong Tower</title>
  <link rel="stylesheet" href="style.css">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</head>
<style>
  .signup {
    width: 80%;
    margin: auto;
    margin-top: 5%;
    margin-bottom: 3%;
  }

  h2 {
    color: red;
    font-size: 40px;
    font-weight: bold;
  }

  .signup-col {
    border: 4px solid red;
    padding: 50px;
  }

  .btn {
    background-color: maroon;
    color: #fff;
  }

  input[type="email"] {
    text-transform: lowercase;
  }
</style>

<body>
  <section class="headers">
    <?php require_once("headers.php"); ?>
    <div class="contents">
      <h1>Trainer Sign Up</h1>
    </div>
  </section>
  <?php

  remove_error();
  function signup()
  {
    extract(escape_data($_POST));
    // Require Fields
    $required_fields = array('first_name', 'last_name', 'birth_date', 'contact', 'email', 'address', 'username', 'password');
    $error_counter = 0;
    foreach ($required_fields as $res) {
      if (empty(${$res})) {
        $_SESSION['error'][$res] = "Please enter your " . ucfirst(str_replace('_', ' ', $res));
        $error_counter++;
      }
    }

    if ($error_counter > 0) {
      return false;
    }
    $check_user_name = get_one("SELECT if(max(u.id) is null, 0, max(u.id) + 1) as `result` from tbl_user u where u.username ='$username' and deleted_flag = 0 limit 1");

    if (!empty($check_user_name->result)) {
      $_SESSION['error']['username'] = "Username Is Already Taken ";
      $error_counter++;
    }

    // Check Email
    $check_email = get_one("SELECT if(max(u.id) is null, 0, max(u.id) + 1) as `result` from tbl_user u where u.email ='$email' and deleted_flag = 0 limit 1");
    // echo "SELECT if(max(u.id) is null, 0, max(u.id) + 1) as `result` from tbl_user u where u.email ='$email' and deleted_flag = 0 limit 1";
    if (!empty($check_email->result)) {
      $_SESSION['error']['email'] = "Email Is Already Taken ";
      $error_counter++;
    }

    if ($error_counter > 0) {
      return false;
    }
    $image_name = 'default.png';
    if ($_FILES['image']['error'] == 0) {
      $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
      $image_name = 'image_' . date('YmdHis') . "." . $ext;
      move_uploaded_file($_FILES["image"]["tmp_name"],   '../profile/' . $image_name);
    }

    // Insert Member
    $user_id = insert_get_id("INSERT INTO tbl_user (`username`,`email`,`password`,branch_id,access_id) VALUES('$username', '$email','$password','$branch',3)");
    query("INSERT INTO tbl_user_info (id,first_name,middle_name,last_name,gender_id,contact_no,`picture`,`barangay`,`city`) VALUES('$user_id','$first_name','$middle_name','$last_name','$gender','$contact','$image_name','$barangay','$city')");
    echo "<script>document.getElementById('myForm').reset();</script>";
    return
      '<div class="alert alert-success d-flex align-items-center" role="alert">
        <div>
          <i class="bi bi-check"></i>
          Trainer Registered Successfully!
        </div>
      </div>';
  }
  ?>

  <section class="signup">
    <h2>Please Signup this form</h2>
    <div class="signup-col">

      <?php echo (isset($_POST['submit'])) ? signup()  : '';  ?>

      <form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate id="myForm">
        <div class="col-md-3">
          <label for="validationCustom01" class="form-label">*First Name</label>
          <input type="text" class="form-control <?= isset($_SESSION['error']['first_name']) ? 'is-invalid' : '' ?>" name="first_name" required value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">
          <div class="invalid-feedback">
            <?= isset($_SESSION['error']['first_name']) ? $_SESSION['error']['first_name'] : '' ?>
          </div>
        </div>

        <div class="col-md-3">
          <label for="validationCustom01" class="form-label">Middle Name</label>
          <input type="text" class="form-control <?= isset($_SESSION['error']['middle_name']) ? 'is-invalid' : '' ?>" name="middle_name" placeholder="Optional" value="<?= isset($_POST['middle_name']) ? $_POST['middle_name'] : '' ?>">
          <div class="invalid-feedback">
            <?= isset($_SESSION['error']['middle_name']) ? $_SESSION['error']['middle_name'] : '' ?>
          </div>
        </div>

        <div class="col-md-3">
          <label for="validationCustom01" class="form-label">*Last Name</label>
          <input type="text" class="form-control <?= isset($_SESSION['error']['last_name']) ? 'is-invalid' : '' ?>" name="last_name" required value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>">
          <div class="invalid-feedback">
            <?= isset($_SESSION['error']['last_name']) ? $_SESSION['error']['last_name'] : '' ?>
          </div>
        </div>

        <div class="col-md-3">
          <label for="validationCustom04" class="form-label">*Gender</label>
          <select class="form-select" name="gender">
            <?php foreach (get_list("select * from tbl_gender where deleted_flag = 0") as $res) { ?>
              <option value="<?= $res['id'] ?>"><?= $res['name'] ?></option>
            <?php } ?>
          </select>

        </div>

        <div class="col-md-3">
          <label for="validationCustom05" class="form-label">*Birth Date</label>
          <input type="date" class="form-control <?= isset($_SESSION['error']['birth_date']) ? 'is-invalid' : '' ?>" name="birth_date" required value="<?= isset($_POST['birth_date']) ? $_POST['birth_date'] : '' ?>">
          <div class="invalid-feedback">
            <?= isset($_SESSION['error']['birth_date']) ? $_SESSION['error']['birth_date'] : '' ?>
          </div>
        </div>

        <div class="col-md-3">
          <label for="validationCustom02" class="form-label ">Contact No#</label>
          <input type="number" class="form-control <?= isset($_SESSION['error']['contact']) ? 'is-invalid' : '' ?>" name="contact" placeholder="09XXXXXXXX" value="<?= isset($_POST['contact']) ? $_POST['contact'] : '' ?>">
          <div class="invalid-feedback">
            <?= isset($_SESSION['error']['contact']) ? $_SESSION['error']['contact'] : '' ?>
          </div>
        </div>

        <div class="col-md-3">
          <label for="validationCustomUsername" class="form-label">*Email</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" class="form-control <?= isset($_SESSION['error']['email']) ? 'is-invalid' : '' ?>" name="email" placeholder="Email Address" required value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
            <div class="invalid-feedback">
              <?= isset($_SESSION['error']['email']) ? $_SESSION['error']['email'] : '' ?>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <label for="validationCustom03" class="form-label">*City & Barangay</label>
          <div style="display: flex;">
            <select id="city" name="city" style="width:50%" class="form-control <?= isset($_SESSION['error']['city']) ? 'is-invalid' : '' ?>">
              <?php foreach (get_list("select * from tbl_city") as $res) { ?>
                <option value="<?= $res['id']; ?>"><?= $res['name']; ?></option>
              <?php } ?>
            </select>
            <select id="barangay" name="barangay" style="width:50%;float:right" class="form-control <?= isset($_SESSION['error']['barangay']) ? 'is-invalid' : '' ?>">
              <?php foreach (get_list("select * from tbl_barangay where city_id = 015501") as $res) { ?>
                <option value="<?= $res['id']; ?>"><?= $res['name']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="invalid-feedback">
            <?= isset($_SESSION['error']['address']) ? $_SESSION['error']['address'] : '' ?>
          </div>
        </div>


        <div class="col-md-3">
          <label for="validationCustom02" class="form-label">*Username</label>
          <input type="text" class="form-control <?= isset($_SESSION['error']['username']) ? 'is-invalid' : '' ?>" name="username" required value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">
          <div class="invalid-feedback">
            <?= isset($_SESSION['error']['username']) ? $_SESSION['error']['username'] : '' ?>
          </div>
        </div>

        <div class="col-md-3">
          <label for="validationCustom02" class="form-label">*Password</label>
          <input type="password" class="form-control <?= isset($_SESSION['error']['password']) ? 'is-invalid' : '' ?>" name="password" required value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
          <div class="invalid-feedback">
            <?= isset($_SESSION['error']['password']) ? $_SESSION['error']['password'] : '' ?>
          </div>
        </div>

        <div class="col-md-3">
          <label for="validationCustom04" class="form-label">*Branch</label>
          <select class="form-select" name="branch">
            <?php foreach (get_list("select * from tbl_branch where deleted_flag = 0") as $res) { ?>
              <option value="<?= $res['id'] ?>"><?= $res['name'] ?></option>
            <?php } ?>
          </select>

        </div>

        <div class="col-md-3">
          <label for="validationCustom02" class="form-label">*Profile Picture</label>
          <input type="file" class="form-control" name="image" required>
          <div class="invalid-feedback">
            Please Insert profile picture.
          </div>
        </div>
        <div class="col-12">
          <button name="submit" class="btn btn-danger" style="background-color: maroon; color:#fff" type="submit">Submit form</button><br>
          <p>Already have an account? just click <a href="join.php">here</a> to login</p>
        </div>
      </form>
    </div>
  </section>

  <?php require_once("footer.php"); ?>
  <script>
    $(document).on("change", "#city", function() {
      let value = $(this).val();
      $.get("../dropdown.php?city=" + value, function(result) {
        $("#barangay").html(result);
      });
    });
  </script>
</body>

</html>