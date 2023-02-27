<?php
require_once('../database/conn.php');
require_once('../functions.php');
if (isset($_SESSION['user']->access_id)) {
    if (in_array($_SESSION['user']->access_id, array(1, 2, 5))) {
        // Super Admin/Admin
        header('location:../admin/home.php');
    } else if (in_array($_SESSION['user']->access_id, array(3))) {
        // Trainer Staff
        header('location:../trainer/home.php');
    } else {
        // Member Page
        header('location:../member/home.php');
    }
}

$page = $_SERVER['PHP_SELF'];
$page = explode("/", $page);
$current = end($page);
$current = str_replace(".php", "", $current);
// $current!='product_food' ? "$current" : 'Active';
function activate($current, $page)
{
    if ($current == $page) {
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
    <title>Strong Tower Gym</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="landing_page.css" rel="stylesheet">
    <link href="landing_page_custom.css" rel="stylesheet">
    <link href="select2.css" rel="stylesheet">
</head>
<script>
    var base_url = "<?php echo "http://" . $_SERVER['SERVER_NAME'] . str_replace("index.php", "", strtok($_SERVER["REQUEST_URI"], '?')); ?>";
</script>

<body class="bg-white">
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="" class="navbar-brand">
                <h1 class="m-0 display-4 font-weight-bold text-uppercase text-white">WE CREATE<span class="text-primary">SHAPES</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4 bg-secondary">
                    <a href="#home" class="nav-item nav-link active">Home</a>
                    <a href="#about" class="nav-item nav-link">About Us</a>
                    <a href="#class" class="nav-item nav-link">Classes</a>
                    <a href="#trainer" class="nav-item nav-link">Trainers</a>
                    <a href="#contact" class="nav-item nav-link">Contact Us</a>
                    <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#register_modal">Register</a>
                    <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#login_modal">Login</a>
                </div>
            </div>
        </nav>
    </div>