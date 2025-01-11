<?php
require_once('../functions.php');
require_once('../database/conn.php');
if (!isset($_SESSION['user']->access_id) && !in_array($_SESSION['user']->access_id, array(1, 2, 3, 5))) {
  header('location:../index.php');
}
function activate($array)
{
  $page = $_SERVER['PHP_SELF'];
  $page = explode("/", $page);
  $current = end($page);
  $current = str_replace(".php", "", $current);
  if (in_array($current, $array)) {
    return "active";
  } {
    return "";
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
  <link rel="stylesheet" href="../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../adminlte/css/admin.css">
</head>
<style>
  .nav-item:hover {
    background: #007bff;
  }

  body {
    /* font-size: 12px !important;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
  }
</style>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-primary navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#modal-default" role="button">
            <i class="fas fa-power-off"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-dark-primary">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../adminlte/dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Strong Tower Gym</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../profile/<?= $_SESSION['user']->picture ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= ucfirst($_SESSION['user']->first_name) . ' ' . ucfirst($_SESSION['user']->last_name); ?><br><?= ucfirst($_SESSION['user']->access ?? 'Customer')  ?><?= $_SESSION['user']->access_id == 1 ? '' : '<br> ' . get_access($_SESSION['user']->branch_id ?? 0); ?></a>
          </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="home.php" class="nav-link <?= activate(array("home")) ?>">
                <i class="fa fa-home nav-icon"></i>
                <p>Home</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="bmi.php" class="nav-link <?= activate(array("bmi")) ?>">
                <i class="fa fa-calculator nav-icon"></i>
                <p>BMI</p>
              </a>
            </li>

            <?php if (!(date('Y-m-d') > $_SESSION['user']->plan_expiration_date) && (!empty($_SESSION['user']->client_plan_id))) { ?>
              <li class="nav-item">
                <a href="workout_today.php" class="nav-link <?= activate(array("workout_today")) ?>">
                  <i class="fa fa-sun nav-icon"></i>
                  <p>Workout Today</p>
                </a>
              </li>
            <?php } ?>

            <!-- <li class="nav-item">
              <a href="my_activity.php" class="nav-link <?= activate(array("my_activity", "view_activity")) ?>">
                <i class="fa fa-calendar nav-icon"></i>
                <p>My Activity</p>
              </a>
            </li> -->

            <?php if (!(date('Y-m-d') > $_SESSION['user']->plan_expiration_date) && (!empty($_SESSION['user']->client_plan_id))) { ?>
              <li class="nav-item">
                <a href="my_plan.php" class="nav-link <?= activate(array("my_plan")) ?>">
                  <i class="fa fa-dumbbell nav-icon"></i>
                  <p>My Workout Plan</p>
                </a>
              </li>
            <?php } ?>


            <li class="nav-item">
              <a href="membership_plans.php" class="nav-link <?= activate(array("membership_plans")) ?>">
                <i class="fa fa-clipboard nav-icon"></i>
                <p>Membership Plans</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="supplements.php" class="nav-link <?= activate(array("supplements")) ?>">
                <i class="fa fa-pills nav-icon"></i>
                <p>Supplements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="services.php" class="nav-link <?= activate(array("services")) ?>">
                <i class="fa fa-handshake nav-icon"></i>
                <p>Services</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="checkout.php" class="nav-link <?= activate(array("checkout")) ?>">
                <i class="fa fa-shopping-cart nav-icon"></i>
                <p>Cart</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="orders.php" class="nav-link <?= activate(array("orders")) ?>">
                <i class="fa fa-box nav-icon"></i>
                <p>Orders</p>
              </a>
            </li> -->

            <li class="nav-item">
              <a href="my_profile.php" class="nav-link <?= activate(array("my_profile")) ?>">
                <i class="fa fa-user nav-icon"></i>
                <p>My Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="manage_account.php" class="nav-link <?= activate(array("manage_account")) ?>">
                <i class="fa fa-lock nav-icon"></i>
                <p>Manage User Account</p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>