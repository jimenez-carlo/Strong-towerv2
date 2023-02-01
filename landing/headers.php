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
<style>
    .links {
        font-weight: bold;
    }

    .headers {
        width: 100%;
        height: 50vh;
        background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
            url(images/backgroud.jpg);
        background-position: center;
        background-size: cover;
        clip-path: polygon(100% 0, 100% 91%, 47% 100%, 0 89%, 0 0);
    }

    .contents {
        margin-top: 5%;
        color: red;
        display: block;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        font-size: 50px;
        font-weight: bold;
        /* text-shadow: 3px 3px 10px #fff; */
        text-shadow: 3px 3px 10px #836d6d;

    }

    a {
        text-decoration: none;
    }

    h1 {
        font-size: 6rem;
    }
</style>

<nav>
    <div class="logo">STRONG<span>TOWER</span></div>
    <div class="open"><i class="fas fa-bars"></i></div>
    <ul class="links">
        <li><a href="../index.php" class="<?= activate($current, "index") ?>">Home</a></li>
        <li><a href="trainers.php" class="<?= activate($current, "trainers") ?>">Trainers</a></li>
        <li><a href="branch.php" class="<?= activate($current, "branch") ?>">Branch</a></li>
        <li><a href="supplement.php" class="<?= activate($current, "supplement") ?>">Supplement</a></li>
        <!-- <li><a href="schedule.php" class="<?= activate($current, "schedule") ?>">Schedule</a></li> -->
        <li><a href="plan.php" class="<?= activate($current, "plan") ?>">Plan</a></li>
        <li><a href="about_us.php" class="<?= activate($current, "about_us") ?>">About</a></li>
        <li><a href="join.php" class="<?= activate($current, "join") ?>">Login</a></li>
        <div class="close"><i class="fas fa-times"></i></div>
    </ul>
</nav>
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