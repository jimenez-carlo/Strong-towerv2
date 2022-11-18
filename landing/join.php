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
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <!-- Awesome fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css
    " integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous" />
  <title>Strong Tower</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<style>
  .join-us {
    width: 80%;
    margin: auto;
    margin-top: 5%;
    text-align: center;
    margin-bottom: 3%;
  }

  h2 {
    color: red;
    font-size: 40px;
    font-weight: bold;
  }

  .row {
    justify-content: space-between;
    display: flex;
  }

  .member-col {
    background-color: cadetblue;
    min-height: 50vh;
    width: 50%;
    background-position: center;
    background-size: cover;
    text-align: center;
    margin-bottom: 3%;
    flex-basis: 40%;
    padding: 20px;
    border-radius: 50px 50px;
  }

  .member-col h2 {

    font-size: 3.8rem;
    padding: 2rem;
    display: inline-block;
    color: black;
    border-bottom: .3rem solid white;
    margin-bottom: 2.2rem;
  }

  .trainer-col {
    padding: 20px;
    flex-basis: 40%;
    background-color: maroon;
    min-height: 50vh;
    width: 50%;
    background-position: center;
    background-size: cover;
    text-align: center;
    margin-bottom: 3%;
    border-radius: 50px 50px;
  }

  .trainer-col h2 {
    font-size: 3.8rem;
    padding: 2rem;
    display: inline-block;
    color: black;
    border-bottom: .3rem solid white;
    margin-bottom: 2.2rem;
  }

  @media(max-width:700px) {
    .row {
      flex-direction: column;
    }

    .member-col,
    .trainer-col {
      width: 100%;
    }
  }

  label {
    color: #fff;
    font-size: 20px;
    float: left;
  }

  input[type='email'] {
    text-transform: lowercase;
  }
</style>

<body>
  <section class="headers">
    <?php require_once("headers.php"); ?>
    <?php

    remove_error();
    function login($type)
    {

      extract(escape_data($_POST));
      $access = ($type == 'trainer') ? 3 : 5;

      $email = $type . '_email';
      $password = $type . '_password';

      if (empty(${$email}) && empty(${$password})) {
        $_SESSION['error'][$email] = 'Please Enter Email';
        $_SESSION['error'][$password]  = 'Please Enter Password';
        return message_error("Please Fill Blank Fields!");
      }

      $user = get_one("SELECT b.name as `branch`,ui.*,u.* from tbl_user u inner join tbl_user_info ui on ui.id = u.id inner join tbl_branch b on b.id = u.branch_id where u.email ='" . ${$email} . "' and u.`password`='" . ${$password} . "' and u.deleted_flag = 0 limit 1");
      $check_user_is_verified = get_one("SELECT if(max(u.id) is null, 0, max(u.id) + 1) as `res` from tbl_user u where u.email ='" . ${$email} . "' and u.`password`='" . ${$password} . "' and u.deleted_flag = 0 and u.access_id = $access  limit 1");

      if (empty($check_user_is_verified->res)) {
        $_SESSION['error'][$email] = '';
        $_SESSION['error'][$password]  = '';
        return message_error("Invalid Username/Password!");
      }

      if (isset($user->verified) && !empty($user->verified)) {
        remove_error();
        $_SESSION['user'] = $user;
        return '<script>location.reload();</script>';
      } else {
        return message_error("Account Not Yet Verfied!");
      }
    }
    ?>

    <div class="contents">
      <h1 style="font-size:60px; font-weight:bold;">Join Us</h1>
    </div>
  </section>

  <div class="join-us">
    <h2>Join Us to Our Team, Choose in to two,
      if you want to Trainor or Member?</h2><br>


    <div class="row">

      <div class="trainer-col">
        <h2>TRAINOR</h2><br>
        <?php echo (isset($_POST['submit']) && $_POST['submit'] == 'trainer') ? login($_POST['submit']) : '';  ?>
        <form method="POST" class="row g-3 needs-validation" novalidate>

          <label for="validationCustomUsername" class="form-label" style="text-align: left;">Email</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" class="form-control <?= isset($_SESSION['error']['trainer_email']) ? 'is-invalid' : '' ?>" name="trainer_email" required value="<?= isset($_POST['trainer_email']) ? $_POST['trainer_email'] : '' ?>">
            <div class="invalid-feedback">
              <?= isset($_SESSION['error']['trainer_email']) ? $_SESSION['error']['trainer_email'] : '' ?>
            </div>
          </div>

          <label for="validationCustom02" class="form-label" style="text-align: left;">Password</label>
          <input type="password" class="form-control <?= isset($_SESSION['error']['trainer_password']) ? 'is-invalid' : '' ?>" name="trainer_password" required value="<?= isset($_POST['trainer_password']) ? $_POST['trainer_password'] : '' ?>">
          <div class="invalid-feedback">
            <?= isset($_SESSION['error']['trainer_password']) ? $_SESSION['error']['trainer_password'] : '' ?>
          </div>

          <div class="div">
            <button name="submit" class="btn btn-primary" value="trainer">LogIn</button><br><br>
            <a href="trainer_signup.php" type="submit" class="btn btn-primary">SignUp</a>
          </div>
        </form>

      </div>
      <div class="member-col">
        <h2>MEMBER</h2><br>
        <?php echo (isset($_POST['submit']) && $_POST['submit'] == 'member') ? login($_POST['submit']) : '';  ?>
        <form method="POST" class="row g-3 needs-validation" novalidate>

          <label for="validationCustomUsername" class="form-label" style="text-align: left;">Email</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" class="form-control <?= isset($_SESSION['error']['member_email']) ? 'is-invalid' : '' ?>" name="member_email" required value="<?= isset($_POST['member_email']) ? $_POST['member_email'] : '' ?>">
            <div class="invalid-feedback">
              <?= isset($_SESSION['error']['member_email']) ? $_SESSION['error']['member_email'] : '' ?>
            </div>
          </div>


          <label for="validationCustom02" class="form-label" style="text-align: left;">Password</label>
          <input type="password" class="form-control <?= isset($_SESSION['error']['member_password']) ? 'is-invalid' : '' ?>" name="member_password" required value="<?= isset($_POST['member_password']) ? $_POST['member_password'] : '' ?>">
          <div class="invalid-feedback">
            <?= isset($_SESSION['error']['member_password']) ? $_SESSION['error']['member_password'] : '' ?>
          </div>

          <div class="div">
            <button name="submit" class="btn btn-primary" value="member">LogIn</button><br><br>
            <a href="member_signup.php" type="submit" class="btn btn-primary">SignUp</a>
          </div>
        </form>
      </div>

    </div>
  </div>
  <?php require_once("footer.php"); ?>
</body>

</html>