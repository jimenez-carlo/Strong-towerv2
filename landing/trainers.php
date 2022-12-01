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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    .trainers .items .item {
        height: 21rem;
        width: 15rem;
    }
</style>

<body>
    <section class="headers">
        <?php require_once("headers.php"); ?>

        <div class="contents">
            <h1>Trainers</h1>
        </div>
    </section>
    <!-- Start Trainers -->
    <section class="trainers">
        <h1>Our Trainers</h1>
        <p>They are Handsome</p>
        <div class="items">
            <div class="item">
                <img src="images/1.jpg" style="object-fit: fill;">
                <div class="inner">
                    <div class="info">
                        <h4>John</h4>
                        <p>online coach</p>
                        <p>Expertise: Powerlifting</p>
                        <div class="links">
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/2.jpg" style="object-fit: fill;">
                <div class="inner">
                    <div class="info">
                        <h4>Karel</h4>
                        <p>online coach</p>
                        <div class="links">
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/3.jpg" style="object-fit: fill;">
                <div class="inner">
                    <div class="info">
                        <h4>Arnold</h4>
                        <p>online coach</p>
                        <div class="links">
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/4.jpg" style="object-fit: fill;">
                <div class="inner">
                    <div class="info">
                        <h4>Michael</h4>
                        <p>online coach</p>
                        <div class="links">
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/5.jpg" style="object-fit: fill;">
                <div class="inner">
                    <div class="info">
                        <h4>Michael</h4>
                        <p>online coach</p>
                        <div class="links">
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once("footer.php"); ?>
</body>

</html>