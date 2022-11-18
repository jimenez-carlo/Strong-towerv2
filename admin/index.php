<?php
require_once('../database/conn.php');
require_once('../functions.php');
if (isset($_SESSION['user']->access_id)) {
  if (in_array($_SESSION['user']->access_id, array(1, 2))) {
    // Super Admin/Admin
    header('location:home.php');
  } else if (in_array($_SESSION['user']->access_id, array(3, 4))) {
    // Trainer Staff
    header('location:../trainer/home.php');
  } else {
    // Member Page
    header('location:../member/home.php');
  }
}
remove_error();
function login()
{
  extract(escape_data($_POST));

  if (empty($username) && empty($password)) {
    $_SESSION['error']['username'] = true;
    $_SESSION['error']['password']  = true;
    return message_error("Please Fill Blank Fields!");
  }

  $user = get_one("SELECT b.name as `branch`,ui.*,u.* from tbl_user u inner join tbl_user_info ui on ui.id = u.id inner join tbl_branch b on b.id = u.branch_id where u.username ='$username' and u.`password`='$password' and u.deleted_flag = 0 limit 1");
  $check_user_is_verified = get_one("SELECT if(max(u.id) is null, 0, max(u.id) + 1) as `res` from tbl_user u where u.username ='$username' and u.`password`='$password' and u.deleted_flag = 0 limit 1");

  if (empty($check_user_is_verified->res)) {
    $_SESSION['error']['username'] = true;
    $_SESSION['error']['password']  = true;
    return message_error("Invalid Username/Password!");
  }

  if (isset($user->verified) && !empty($user->verified)) {
    $_SESSION['user'] = $user;
    return header('location:home.php');
  } else {
    return message_error("Account Not Yet Verfied!");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Strong Tower | Client</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box" style="width: 400px;">
    <div class="login-logo">
      <a href="index2.html"><b>Strong Tower</b></a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <?php echo (isset($_POST['login'])) ? login() : '';  ?>
        <form method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control <?= isset($_SESSION['error']['username']) ? 'is-invalid' : '' ?>" placeholder="Username" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control <?= isset($_SESSION['error']['password']) ? 'is-invalid' : '' ?>" placeholder="Password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-6">
              <a href="../index.php" class="btn btn-danger btn-block">Back</a>
            </div>
            <!-- <div class="col-4">
            </div> -->
            <div class="col-6">
              <button type="submit" class="btn btn-danger btn-block" name="login">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>



      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
  <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>