<?php
require_once('../functions.php');
require_once('../database/conn.php');
if (!isset($_SESSION['user']->access_id) && !in_array($_SESSION['user']->access_id, array(1, 2,  4, 5))) {
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


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-danger navbar-light">
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
    <aside class="main-sidebar elevation-4 sidebar-dark-danger">
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
            <a href="#" class="d-block"><?= ucfirst($_SESSION['user']->first_name) . ' ' . ucfirst($_SESSION['user']->last_name); ?></a>
          </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <!-- Trainer -->
            <li class="nav-item"><a href="home.php" class="nav-link <?= activate(array("home")) ?>"><i class="fa fa-home nav-icon"></i>
                <p>Home</p>
              </a></li>
            <!-- <li class="nav-item"><a href="client_list.php" class="nav-link <?= activate(array("client_list", "create_client_list", "edit_client_list")) ?>" name="admin/clients"><i class="fa fa-users nav-icon"></i>
                <p>Client List</p>
              </a></li> -->
            <li class="nav-item"><a href="my_clients.php" class="nav-link <?= activate(array("my_clients", "create_my_client", "edit_my_client", "bmi")) ?>" name="admin/trainer_clients"><i class="fa fa-users nav-icon"></i>
                <p>My Clients</p>
              </a></li>
            <!-- <li class="nav-item"><a href="membership_plans.php" class="nav-link <?= activate(array("membership_plans", "create_membership_plan", "edit_membership_plan")) ?>" name="admin/plans"><i class="fa fa-clipboard nav-icon"></i>
                <p>Membership Plans</p>
              </a></li> -->
            <li class="nav-item"><a href="category.php" class="nav-link <?= activate(array("category", "create_category", "edit_category")) ?>"><i class="fa fa-tag nav-icon"></i>
                <p>Categories</p>
              </a></li>
            <li class="nav-item"><a href="workouts.php" class="nav-link <?= activate(array("workouts", "create_workout", "edit_workout")) ?>" name="admin/workouts"><i class="fa fa-hand-rock nav-icon"></i>
                <p>Workouts</p>
              </a></li>
            <!-- <li class="nav-item"><a href="equipments.php" class="nav-link <?= activate(array("equipements", "create_equipement", "edit_equipement")) ?>" name="admin/equipments"><i class="fa fa-dumbbell nav-icon"></i>
                <p>Equipments</p>
              </a></li>
            <li class="nav-item"><a href="supplements.php" class="nav-link <?= activate(array("supplements", "create_supplement", "edit_supplement")) ?>" name="admin/supplements"><i class="fa fa-pills nav-icon"></i>
                <p>Supplements</p>
              </a></li> -->
            <li class="nav-item"><a href="services.php" class="nav-link <?= activate(array("services", "create_service", "edit_service")) ?>" name="admin/services"><i class="fa fa-handshake nav-icon"></i>
                <p>Services</p>
              </a></li>

            <li class="nav-item">
              <a href="my_profile.php" class="nav-link <?= activate(array("my_profile")) ?>">
                <i class="fa fa-user nav-icon"></i>
                <p>My Profile</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>