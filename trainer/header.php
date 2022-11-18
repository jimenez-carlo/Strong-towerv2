<?php
require_once('../database/conn.php');
if (!isset($_SESSION['user']->access_id) && !in_array($_SESSION['user']->access_id, array(1, 2))) {
  header('location:../index.php');
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
            <img src="../adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
            <li class="nav-item"><a href="." class="nav-link btn-side active"><i class="fa fa-home nav-icon"></i>
                <p>Home</p>
              </a></li>
            <li class="nav-item"><a href="#" class="nav-link btn-side" name="admin/clients"><i class="fa fa-users nav-icon"></i>
                <p>Client List</p>
              </a></li>
            <li class="nav-item"><a href="#" class="nav-link btn-side" name="admin/trainer_clients"><i class="fa fa-users nav-icon"></i>
                <p>My Clients</p>
              </a></li>
            <li class="nav-item"><a href="#" class="nav-link btn-side" name="admin/plans"><i class="fa fa-clipboard nav-icon"></i>
                <p>Membership Plans</p>
              </a></li>
            <li class="nav-item"><a href="#" class="nav-link btn-side" name="admin/workouts"><i class="fa fa-hand-rock nav-icon"></i>
                <p>Workouts</p>
              </a></li>
            <li class="nav-item"><a href="#" class="nav-link btn-side" name="admin/equipments"><i class="fa fa-dumbbell nav-icon"></i>
                <p>Equipments</p>
              </a></li>
            <li class="nav-item"><a href="#" class="nav-link btn-side" name="admin/supplements"><i class="fa fa-pills nav-icon"></i>
                <p>Supplements</p>
              </a></li>
            <li class="nav-item"><a href="#" class="nav-link btn-side" name="admin/services"><i class="fa fa-handshake nav-icon"></i>
                <p>Services</p>
              </a></li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>