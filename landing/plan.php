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
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    width: 40%;
  }

  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
  }

  .container {
    padding: 2px 16px;
  }

  .card-footer.text-muted>* {
    /* display: block; */
    /* width: 50%; */

  }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body>
  <section class="headers">
    <?php require_once("headers.php"); ?>

    <div class="contents">
      <h1>Plans</h1>
    </div>

  </section>
  <section class="container mb-5">
    <div class="row">
      <?php foreach (get_list("SELECT * from tbl_plan where  deleted_flag = 0 limit 3") as $res) { ?>

        <div class="col">
          <div class="card" style="width: 18rem;">
            <div class="card-header text-danger">
              <h4 class="my-0 font-weight-normal text-center"><?= $res['name'] ?></h4>
            </div>
            <div class="card-body text-center" style="min-height: 180px;">
              <h3 class="card-title pricing-card-title"><?= number_format($res['per_month'], 2) ?> <small class="text-muted">/ Monthly</small></h3>
              <h4 class="card-title pricing-card-title"><?= number_format($res['per_session'], 2) ?> <small class="text-muted">/ Walk In</small></h4>
              <ul class="list-unstyled mt-3 mb-4">
                <li><?= $res['description'] ?></li>
              </ul>
            </div>


          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <?php require_once("footer.php"); ?>
</body>

</html>