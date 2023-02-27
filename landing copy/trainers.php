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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<style>
    .trainers .items .item {
        height: 21rem;
        width: 15rem;
    }
    .container {
        margin-top: 5%;
    }
   .d-block{ 
         width: 100%; 
         height: 400px; 
     }
    img {
        height: 250px;
        width: 45px;
        object-fit: contain;
        /* background: red; */
    }
 
</style>

<body>
    <section class="headers">
        <?php require_once("headers.php"); ?>

        <div class="contents">
            <h1>Trainers</h1>
        </div>
    </section>


    <section class="container mb-5">
        <div class="row">
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div data-bs-toggle="modal" data-bs-target="#modal_1" class="carousel-item active" data-bs-interval="10000">
                        <img src="images/1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Cardio</h5>

                        </div>
                    </div>
                    <div data-bs-toggle="modal" data-bs-target="#modal_2" class="carousel-item" data-bs-interval="10000">
                        <img src="images/2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Crossfit</h5>

                        </div>
                    </div>
                    <div data-bs-toggle="modal" data-bs-target="#modal_3" class="carousel-item">
                        <img src="images/3.jpg" class="d-block w-200" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Power Lifting</h5>

                        </div>
                    </div>
                    <div data-bs-toggle="modal" data-bs-target="#modal_4" class="carousel-item" data-bs-interval="2000">
                        <img src="images/4.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Corssfit</h5>

                        </div>
                    </div>
                    <div data-bs-toggle="modal" data-bs-target="#modal_5" class="carousel-item" data-bs-interval="2000">
                        <img src="images/5.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Power lifting</h5>

                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col">
                <div class="card" style="width: 13rem;">
                    <img src="images/1.jpg" class="card-img-top" alt="..." style="height:286px;width:100%;object-fit:contain;background:red">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">Cardio</p>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 13rem;">
                    <img src="images/2.jpg" class="card-img-top" alt="..." style="height:286px;width:100%;object-fit:contain;background:red">
                    <div class="card-body">
                        <h5 class="card-title">Mike</h5>
                        <p class="card-text">Crossfit</p>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 13rem;">
                    <img src="images/3.jpg" class="card-img-top" alt="..." style="height:286px;width:100%;object-fit:contain;background:red">
                    <div class="card-body">
                        <h5 class="card-title">Rex</h5>
                        <p class="card-text">Power Lifting</p>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 13rem;">
                    <img src="images/4.jpg" class="card-img-top" alt="..." style="height:286px;width:100%;object-fit:contain;background:red">
                    <div class="card-body">
                        <h5 class="card-title">Dan Fernandez</h5>
                        <p class="card-text">Crossfit</p>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 13rem;">
                    <img src="images/5.jpg" class="card-img-top" alt="..." style="height:286px;width:100%;object-fit:contain;background:red">
                    <div class="card-body">
                        <h5 class="card-title">Dan Fernandez</h5>
                        <p class="card-text">Power Lifting</p>
                    </div>

                </div>
            </div>
        </div> -->
    </section>

    <div class="modal fade" id="modal_1" tabindex="-1" aria-labelledby="modal_1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card">
                    <img src="images/1.jpg" class="card-img-top" alt="..." style="height:286px;width:100%;object-fit:contain;background:red">
                    <div class="card-body">
                        <h5 class="card-title">Coach John Doe</h5>
                        <p class="card-text">Cardio</p>
                        <p class="card-text">09501440705</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_2" tabindex="-1" aria-labelledby="modal_2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card">
                    <img src="images/2.jpg" class="card-img-top" alt="..." style="height:286px;width:100%;object-fit:contain;background:red">
                    <div class="card-body">
                        <h5 class="card-title">Coach Fernandez</h5>
                        <p class="card-text">Cardio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_3" tabindex="-1" aria-labelledby="modal_3Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card">
                    <img src="images/3.jpg" class="card-img-top" alt="..." style="height:286px;width:100%;object-fit:contain;background:red">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">Cardio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_4" tabindex="-1" aria-labelledby="modal_4Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card">
                    <img src="images/4.jpg" class="card-img-top" alt="..." style="height:286px;width:100%;object-fit:contain;background:red">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">Cardio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_5" tabindex="-1" aria-labelledby="modal_5Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card">
                    <img src="images/5.jpg" class="card-img-top" alt="..." style="height:286px;width:100%;object-fit:contain;background:red">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">Cardio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("footer.php"); ?>
</body>

</html>