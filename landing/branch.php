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

<body>
  <section class="headers">
    <?php require_once("headers.php"); ?>

    <div class="contents">
      <h1>Branch</h1>
    </div>
  </section>
  <section class="container mb-5">
    <div class="row">
      <?php foreach (get_list("SELECT * from tbl_branch where  deleted_flag = 0 limit 2") as $res) { ?>

        <div class="col">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="../landing/images/gym.jpg" class="img-fluid rounded-start" alt="..." style="object-fit: cover;height:100%">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title"><?= $res['name'] ?></h3>
                  <p class="card-text"><?= $res['description'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <?php require_once("footer.php"); ?>
</body>

</html>