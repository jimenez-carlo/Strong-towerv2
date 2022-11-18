<?php
require_once('database/conn.php');
require_once('functions.php');
if (isset($_SESSION['user']->access_id)) {
    if (in_array($_SESSION['user']->access_id, array(1, 2))) {
        // Super Admin/Admin
        header('location:admin/home.php');
    } else if (in_array($_SESSION['user']->access_id, array(3, 4))) {
        // Trainer Staff
        header('location:trainer/home.php');
    } else {
        // Member Page
        header('location:member/home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Tower</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="landing/style.css">
</head>
<style>
    .join {
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
            url(landing/images/home.jpg);
        min-height: 50vh;
        width: 100%;
        background-position: center;
        background-size: cover;
        text-align: center;
        margin-bottom: 3%;
    }

    .join h1 {
        font-size: 3.8rem;
        padding: 2rem;
        display: inline-block;
        color: red;
        border-bottom: .3rem solid white;
        margin-bottom: 2.2rem;
    }

    .text {
        color: #fff;
        font-size: 30px;
        font-weight: bold;
        text-align: center;
    }

    .links {
        font-weight: bold;
    }

    .header .content h1 {
        font-size: 6rem;
        text-transform: uppercase;
        color: red;
    }

    .content {
        text-shadow: 3px 3px 10px #fff;
        text-shadow: 3px 3px 10px #836d6d;
    }

    h1 {
        font-weight: bold !important;
    }

    a {
        text-decoration: none;
    }
</style>

<body>
    <!-- Start Header -->
    <header>
        <nav>
            <div class="logo">STRONG<span>TOWER</span></div>
            <div class="open"><i class="fas fa-bars"></i></div>
            <ul class="links">
                <li><a href="../index.php" class="active">Home</a></li>
                <li><a href="landing/trainers.php">Trainers</a></li>
                <li><a href="landing/branch.php">Branch</a></li>
                <li><a href="landing/supplement.php">Supplement</a></li>
                <li><a href="landing/schedule.php">Schedule</a></li>
                <li><a href="landing/about_us.php">About</a></li>
                <div class="close"><i class="fas fa-times"></i></div>
            </ul>
        </nav>
        <div class="content">
            <h2>The Largest Gymnasium in Pangasinan</h2>
            <h1>WE CREATE SHAPE</h1>
        </div>
    </header>

    <!-- Start Register -->
    <section class="join">
        <h1>JOIN US</h1><br>
        <p class="text">Join Us Strong Tower to Improve your Body Fitness</p><br><br>
        <a href="landing/join.php" type="submit" name="submit" class="btn">Connect Us</a> <br><br>
    </section>
    <?php require_once("landing/footer.php"); ?>
    <!-- Javascript Section -->
    <script>
        var mainMenu = document.querySelector('.links')
        var openMenu = document.querySelector('.open')
        var closeMenu = document.querySelector('.close')

        openMenu.addEventListener('click', show)
        closeMenu.addEventListener('click', close)

        function show() {
            mainMenu.style.display = 'flex'
            mainMenu.style.right = '0'
        }

        function close() {
            mainMenu.style.right = '-60%'
        }
    </script>
</body>

</html>