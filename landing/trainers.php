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


    <section class="container mb-5">
        <div class="row">
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
        </div>
    </section>


    <?php require_once("footer.php"); ?>
</body>

</html>