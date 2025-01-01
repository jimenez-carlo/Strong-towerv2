<?php
require_once('database/conn.php');
require_once('functions.php');
if (isset($_SESSION['user']->access_id)) {
    if (in_array($_SESSION['user']->access_id, array(1, 2))) {
        // Super Admin/Admin
        header('location:admin/home.php');
    } else if (in_array($_SESSION['user']->access_id, array(3))) {
        // Trainer Staff
        header('location:trainer/home.php');
    } else {
        // Member Page
        header('location:member/home.php');
    }
}
?>

<?php

remove_error();
function login($data)
{

    extract($data);
    // $access = ($type == 'trainer') ? 3 : 4;

    // $email = $type . '_email';
    // $password = $type . '_password';

    if (empty($email) && empty($password)) {
        $_SESSION['error'][$email] = 'Please Enter Email';
        $_SESSION['error'][$password]  = 'Please Enter Password';
        return message_error("Please Fill Blank Fields!");
    }

    $user = get_one("SELECT b.name as `branch`,ui.*,u.* from tbl_user u inner join tbl_user_info ui on ui.id = u.id inner join tbl_branch b on b.id = u.branch_id left join refcitymun c on c.id = b.city where (u.email ='" . $email . "' or u.username ='" . $email . "') and u.`password`='" . $password . "' and u.deleted_flag = 0 and u.active_flag = 1 limit 1");
    $check_user_is_verified = get_one("SELECT if(max(u.id) is null, 0, max(u.id) + 1) as `res` from tbl_user u where (u.email ='" . $email . "' or u.username ='" . $email . "') and u.`password`='" . $password . "' and u.deleted_flag = 0  limit 1");

    if (empty($check_user_is_verified->res)) {
        $_SESSION['error'][$email] = '';
        $_SESSION['error'][$password]  = '';
        return message_error("Invalid Username/Password!");
    }



    if (isset($user->verified) && !empty($user->verified)) {
        remove_error();
        // return print_r($user);
        $_SESSION['user'] = $user;
        return '<script>location.reload();</script>';
    } else {
        return message_error("Account Not Yet Verfied!");
    }
}
function signup($data)
{
    extract($data);
    // Require Fields
    $required_fields = array('first_name', 'last_name', 'contact', 'email',  'username', 'password');
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

    if (!empty($check_email->result)) {
        $_SESSION['error']['email'] = "Email Is Already Taken ";
        $error_counter++;
    }

    if ($re_password != $password) {
        $_SESSION['error']['password'] = "Password Does Not Match!";
        $error_counter++;
    }
    if ($error_counter > 0) {
        echo "<script>alert('Signup Failed')</script>";
        return;
    }

    // Insert Member
    $user_id = insert_get_id("INSERT INTO tbl_user (`username`,`email`,`password`,branch_id,access_id) VALUES('$username', '$email','$password','$branch','$type')");
    query("INSERT INTO tbl_user_info (id,first_name,last_name,gender_id,contact_no) VALUES('$user_id','$first_name','$last_name','$gender','$contact')");
    echo "<script>document.getElementById('myForm').reset();</script>";
    return
        '<div class="alert alert-success d-flex align-items-center" role="alert">
        <div>
          <i class="bi bi-check"></i>
          Member Registered Successfully!
        </div>
      </div>';
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
<style>
    .team .card:hover .card-social {
        top: 0;
        height: calc(100% - 100px);
        opacity: 0;
        background: rgba(0, 0, 0, .3)
    }
</style>

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
                    <a href="#trainer" class="nav-item nav-link">Trainers</a>
                    <a href="#contact" class="nav-item nav-link">Branch</a>
                    <a href="#supplements" class="nav-item nav-link">Supplements</a>
                    <a href="#plans" class="nav-item nav-link">Plans</a>
                    <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#register_modal">Register</a>
                    <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#login_modal">Login</a>
                </div>
            </div>
        </nav>
    </div>

    <div>
        <!-- Carousel Start -->
        <div class="container-fluid p-0" id="home">
            <div id="blog-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="assets/landing/backgroud.jpg" alt="Image" style="height:1087px;object-fit:cover">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <h3 class="text-white text-capitalize m-0">Gym & Fitness Centeasdasdr</h3>
                            <h2 class="display-2 m-0 mt-2 mt-md-4 text-primary font-weight-bold text-capitalize">Strong Tower Gym</h2>
                            <a href="#" class="btn btn-lg btn-outline-light mt-3 mt-md-5 py-md-3 px-md-5" data-toggle="modal" data-target="#register_modal">Join Us Now</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="assets/landing/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <h3 class="text-white text-capitalize m-0">Gym & Fitness Centerasdasdas</h3>
                            <h2 class="display-2 m-0 mt-2 mt-md-4 text-primary font-weight-bold text-capitalize">Strong Tower Gym</h2>
                            <a href="#" class="btn btn-lg btn-outline-light mt-3 mt-md-5 py-md-3 px-md-5" data-toggle="modal" data-target="#register_modal">Join Us Now</a>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Gym Class Start -->
        <div class="container gym-class mb-5">
            <div class="row px-3">
                <div class="col-md-6 p-0">
                    <div class="gym-class-box d-flex flex-column align-items-end justify-content-center bg-primary text-right text-white py-5 px-5">
                        <i class="flaticon-six-pack"></i>
                        <h3 class="display-4 mb-3 text-white font-weight-bold">Body Building</h3>
                        <p>
                            Lorem justo tempor sit aliquyam invidunt, amet vero ea dolor ipsum ut diam sit dolores, dolor
                            sit eos sea sanctus erat lorem nonumy sanctus takimata. Kasd amet sit sadipscing at..
                        </p>
                        <a href="#" class="btn btn-lg btn-outline-light mt-4 px-4" data-toggle="modal" data-target="#register_modal">Join Now</a>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="gym-class-box d-flex flex-column align-items-start justify-content-center bg-secondary text-left text-white py-5 px-5">
                        <i class="flaticon-bodybuilding"></i>
                        <h3 class="display-4 mb-3 text-white font-weight-bold">Muscle Building</h3>
                        <p>
                            Lorem justo tempor sit aliquyam invidunt, amet vero ea dolor ipsum ut diam sit dolores, dolor
                            sit eos sea sanctus erat lorem nonumy sanctus takimata. Kasd amet sit sadipscing at..
                        </p>
                        <a href="#" class="btn btn-lg btn-outline-light mt-4 px-4" data-toggle="modal" data-target="#register_modal">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gym Class End -->


        <!-- About Start -->
        <div class="container py-5" id="about">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img class="img-fluid mb-4 mb-lg-0" src="assets/landing/about.jpg" alt="Image">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-4 font-weight-bold mb-4">About Us</h2>
                    <p>Strong Tower Fitness Was Started In 2016 And Has The Same Mission It Had Then, Help People, Help Our Community. We Strive To Help Everyone Who Comes Through Our Door To Become The Best Person They Can Be. We Believe That There Is Much More To Our Gym Than Just Working Out. Our Members And Culture Promote A Positive And Encouraging Atmosphere That Is Addictive! New Members Are Surrounded By People Trying To Improve And Are Excited To See A New Face! We Consider Our Members To Be Family. It Doesn't Matter What Your Cardiovascular Endurance Is, How Much You Weigh, Or How Old You Are. If You Are Looking To Improve Yourself And Are Willing To Put The Work In This Is The Place For You!</p>
                    <div class="row py-2">
                        <div class="col-sm-6">
                            <i class="flaticon-barbell display-2 text-primary"></i>
                            <h4 class="font-weight-bold">Certified GYM Center</h4>
                            <p>Ipsum sanctu dolor ipsum dolore sit et kasd duo</p>
                        </div>
                        <div class="col-sm-6">
                            <i class="flaticon-medal display-2 text-primary"></i>
                            <h4 class="font-weight-bold">Award Winning</h4>
                            <p>Ipsum sanctu dolor ipsum dolore sit et kasd duo</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-lg px-4 btn-outline-primary" data-toggle="modal" data-target="#login_modal">Learn More</a>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Features Start -->
        <div class="container-fluid my-5">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="d-flex align-items-center bg-secondary text-white px-5" style="min-height: 300px;">
                        <i class="flaticon-training display-3 text-primary mr-3"></i>
                        <div class="">
                            <h2 class="text-white mb-3">Progression</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="d-flex align-items-center bg-primary text-white px-5" style="min-height: 300px;">
                        <i class="flaticon-weightlifting display-3 text-secondary mr-3"></i>
                        <div class="">
                            <h2 class="text-white mb-3">Workout</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="d-flex align-items-center bg-secondary text-white px-5" style="min-height: 300px;">
                        <i class="flaticon-treadmill display-3 text-primary mr-3"></i>
                        <div class="">
                            <h2 class="text-white mb-3">Nutrition</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features End -->






        <!-- Team Start -->
        <div class="container pt-5 team " id="trainer">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-primary font-weight-bold">Our Trainers</h4>
                <h4 class="display-4 font-weight-bold">Meet Our Expert Trainers</h4>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="card border-0 bg-secondary text-center text-white">
                        <img class="card-img-top" src="assets/landing/img1.jpg" alt="" style="min-height: 290px;object-fit:contain">
                        <div class="card-social d-flex align-items-center justify-content-center">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="card-body bg-secondary">
                            <h4 class="card-title text-primary">Trainer Name</h4>
                            <p class="card-text">Trainer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="card border-0 bg-secondary text-center text-white">
                        <img class="card-img-top" src="assets/landing/img2.jpg" alt="" style="min-height: 290px;object-fit:contain">
                        <div class="card-social d-flex align-items-center justify-content-center">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="card-body bg-secondary">
                            <h4 class="card-title text-primary">Trainer Name</h4>
                            <p class="card-text">Trainer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="card border-0 bg-secondary text-center text-white">
                        <img class="card-img-top" src="assets/landing/img3.jpg" alt="" style="min-height: 290px;object-fit:contain">
                        <div class="card-social d-flex align-items-center justify-content-center">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="card-body bg-secondary">
                            <h4 class="card-title text-primary">Trainer Name</h4>
                            <p class="card-text">Trainer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="card border-0 bg-secondary text-center text-white">
                        <img class="card-img-top" src="assets/landing/team-4.jpg" alt="" style="min-height: 290px;object-fit:contain">
                        <div class="card-social d-flex align-items-center justify-content-center">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="card-body bg-secondary">
                            <h4 class="card-title text-primary">Trainer Name</h4>
                            <p class="card-text">Trainer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->


        <!-- Team Start -->
        <div class="container pt-5 team " id="plans">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-primary font-weight-bold">Plans</h4>
            </div>
            <div class="row">

                <?php foreach (get_list("SELECT * from tbl_plan where  deleted_flag = 0 limit 4") as $res) { ?>
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="card border-0 bg-secondary text-center text-white">
                            <div class="card-social d-flex align-items-center justify-content-center">
                                <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="card-body bg-secondary">
                                <h4 class="card-title text-primary"><?= $res['name'] ?></h4>
                                <p class="card-text"><?= number_format($res['per_month'], 2) ?> <small class="text-muted">/ Monthly</small></p>
                                <p class="card-text"><?= number_format($res['per_month'], 2) ?> <small class="text-muted">/ Walk In</small></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>


        <!-- Team Start -->
        <div class="container pt-5 team " id="contact">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-primary font-weight-bold">Branches</h4>
            </div>
            <div class="row">

                <?php foreach (get_list("SELECT b.*,upper(b.name) as `name`, bb.name as barangay, c.name as city from tbl_branch b left join tbl_barangay bb on bb.id = b.barangay left join tbl_city c on c.id = b.city where  b.deleted_flag = 0 limit 4") as $res) { ?>
                    <div class="col-lg-3 col-md-6 mb-5" data-toggle="modal" data-target="#view_branch_<?= $res['id'] ?>">
                        <div class="card border-0 bg-secondary text-center text-white">
                            <div class="card-body bg-secondary" style="min-height:200px">
                                <h4 class="card-title text-primary"><?= $res['name'] ?></h4>
                                <p class="card-text"><?= $res['city'] ?><br><?= $res['barangay'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="view_branch_<?= $res['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Branch - <?= $res['name'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- Contact Start -->
                                <div class="container pt-5" id="contact">
                                    <div class="d-flex flex-column text-center mb-5">
                                        <h4 class="text-primary font-weight-bold">Get In Touch</h4>
                                        <h4 class="display-4 font-weight-bold">Email Us For Any Query</h4>
                                    </div>
                                    <div class="row px-3 pb-2">
                                        <div class="col-sm-4 text-center mb-3">
                                            <i class="fa fa-2x fa-map-marker-alt mb-3 text-primary"></i>
                                            <h4 class="font-weight-bold">Address</h4>
                                            <p><?= $res['address'] ?></p>
                                        </div>
                                        <div class="col-sm-4 text-center mb-3">
                                            <i class="fa fa-2x fa-phone-alt mb-3 text-primary"></i>
                                            <h4 class="font-weight-bold">Phone</h4>
                                            <p><?= $res['contact_no'] ?></p>
                                        </div>
                                        <div class="col-sm-4 text-center mb-3">
                                            <i class="far fa-2x fa-envelope mb-3 text-primary"></i>
                                            <h4 class="font-weight-bold">Email</h4>
                                            <p><?= $res['email'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pb-5">
                                            <iframe style="width: 100%; height: 392px;" src="<?= $res['google_map'] ?>" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>


    <!-- Team Start -->
    <div class="container pt-5 team " id="supplements">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="text-primary font-weight-bold">Supplements</h4>
        </div>
        <div class="row">

            <?php foreach (get_list("SELECT * from tbl_supplements where  deleted_flag = 0 limit 4") as $res) { ?>
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="card border-0 bg-secondary text-center text-white">
                        <img class="card-img-top" src="supplements/<?= $res['image'] ?>" alt="" style="min-height: 290px;max-height: 290px;object-fit:contain">
                        <div class="card-social d-flex align-items-center justify-content-center">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="card-body bg-secondary" style="min-height:277px">
                            <h4 class="card-title text-primary"><?= $res['name'] ?></h4>
                            <p class="card-text"><?= $res['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <!-- Team Start -->
    <div class="container pt-5 team " id="plans">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="text-primary font-weight-bold">Plans</h4>
        </div>
        <div class="row">

            <?php foreach (get_list("SELECT * from tbl_plan where  deleted_flag = 0 limit 4") as $res) { ?>
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="card border-0 bg-secondary text-center text-white">
                        <div class="card-social d-flex align-items-center justify-content-center">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="card-body bg-secondary">
                            <h4 class="card-title text-primary"><?= $res['name'] ?></h4>
                            <p class="card-text"><?= number_format($res['per_month'], 2) ?> <small class="text-muted">/ Monthly</small></p>
                            <p class="card-text"><?= number_format($res['per_month'], 2) ?> <small class="text-muted">/ Walk In</small></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo (isset($_POST['login'])) ? login($_POST) : '';  ?>
                <form method="post" name="landing_login">
                    <div class="modal-body">
                        <div id="login_result"></div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="email" id="email" placeholder="Username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" id="inlineFormInputGroup" name="password" id="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="login">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo (isset($_POST['register'])) ? signup($_POST) : '';  ?>
                <form method="post" name="landing_signup" onsubmit="return confirm('Are You Sure?');">
                    <div class="modal-body">
                        <div id="signup_result"></div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">*Username</label>
                                <input type="text" class="form-control" name="username" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">*Email</label>
                                <input type="email" pattern="^[a-zA-Z0-9]+@gmail\.com$" class="form-control" name="email" id="inputPassword4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">*Password</label>
                                <input type="password" class="form-control" name="password" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">*Re-Type Password</label>
                                <input type="password" class="form-control" name="re_password" id="inputPassword4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">*First Name</label>
                                <input type="text" class="form-control" name="first_name" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">*Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="inputPassword4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">*Contact No</label>
                                <input type="number" class="form-control" name="contact" id="inputPassword4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Gender</label>
                                <select class="custom-select" name="gender" style="width: 100%;height:38px">
                                    <?php foreach (get_list("select * from tbl_gender where deleted_flag = 0") as $res) { ?>
                                        <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Type</label>
                                <select class="custom-select" name="type" style="width: 100%;height:38px">
                                    <?php foreach (get_list("select * from tbl_access where deleted_flag = 0 and id in(3,4) and deleted_flag = 0") as $res) { ?>
                                        <option value="<?= $res['id']; ?>"><?= $res['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Branch</label>
                                <select class="custom-select" name="branch" style="width: 100%;height:38px">
                                    <?php foreach (get_list("select b.*,concat(UPPER(b.name) ,' - ', c.name, ' - ', bb.name) as `name` from tbl_branch b left join tbl_barangay bb on bb.id = b.barangay left join tbl_city c on c.id = b.city where b.deleted_flag = 0") as $res) { ?>
                                        <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="register">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="footer container-fluid mt-5 py-5 px-sm-3 px-md-5 text-white">
        <div class="row pt-5">
            <div class="col-lg-9 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>3rd floor SP North Building (EastWestBank), Urdaneta, Philippines, 2400</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+639083403181</p>
                <p><i class="fa fa-envelope mr-2"></i>strongtower@gmail.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Opening Hours</h4>
                <h5 class="text-white">Monday - Saturday</h5>
                <p>7 AM - 8.30 PM</p>
                <h5 class="text-white">Sunday</h5>
                <p>1 PM - 8.00 PM</p>
            </div>
        </div>
        <div class="container border-top border-dark pt-5">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-white font-weight-bold" href="#">Strong Tower Gym</a>. All Rights Reserved.</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-primary back-to-top" id="go-up"><i class="fa fa-angle-double-up"></i></a>
    <a href="#" class="btn btn-outline-primary back-to-top" style="margin-right:127px" data-toggle="modal" data-target="#register_modal">Register</a>
    <a href="#" class="btn btn-outline-primary back-to-top" style="margin-right:46px" data-toggle="modal" data-target="#login_modal">Login</a>


    <!-- JavaScript Libraries -->
    <script src="landing_jquery.js"></script>
    <script src="landing_boostrap.js"></script>
    <script src="select2.js"></script>

    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>


    <!-- Template Javascript -->
    <!-- <script src="js/main.js"></script> -->
    <script src="landing_page.js"></script>
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