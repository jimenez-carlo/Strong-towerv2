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
  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    color: #fff;
    background-color: red;
  }

  /* .btn-dark {
    background-color: red!important;
  } */
</style>

<body>
  <section class="headers">
    <?php require_once("headers.php"); ?>

    <div class="contents">
      <h1>Schedule</h1>
    </div>
  </section>
  <!-- Class Timetable Start -->
  <div class="container gym-feature py-5" id="class">
    <div class="d-flex flex-column text-center mb-5">
      <h4 class="display-4 font-weight-bold">Working Hours and Class Time</h4>
    </div>

    <div class="tab-content">
      <div id="class-all" class="container tab-pane p-0 active">
        <div class="table-responsive">
          <table class="table table-bordered table-lg m-0">
            <thead class="bg-dark text-white text-center">
              <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <th class="bg-dark text-white align-middle">6.00am - 8.00am</th>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">10.00am - 12.00am</th>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">5.00pm - 7.00pm</th>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">7.00pm - 9.00pm</th>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div id="class-cardio" class="container tab-pane fade p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-lg m-0">
            <thead class="bg-dark text-white text-center">
              <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <th class="bg-dark text-white align-middle">6.00am - 8.00am</th>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Cardio</h5>John Deo
                </td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">10.00am - 12.00am</th>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">5.00pm - 7.00pm</th>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">7.00pm - 9.00pm</th>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div id="class-crossfit" class="container tab-pane fade p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-lg m-0">
            <thead class="bg-dark text-white text-center">
              <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <th class="bg-dark text-white align-middle">6.00am - 8.00am</th>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">10.00am - 12.00am</th>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Crossfit</h5>Adam Phillips
                </td>
                <td></td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">5.00pm - 7.00pm</th>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Crossfit</h5>Adam Phillips
                </td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">7.00pm - 9.00pm</th>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td>
                  <h5>Power Lifting</h5>James Alien
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div id="class-powerlifting" class="container tab-pane fade p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-lg m-0">
            <thead class="bg-dark text-white text-center">
              <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <th class="bg-dark text-white align-middle">6.00am - 8.00am</th>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">10.00am - 12.00am</th>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">5.00pm - 7.00pm</th>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Power Lifting</h5>James Alien
                </td>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
              </tr>
              <tr>
                <th class="bg-dark text-white align-middle">7.00pm - 9.00pm</th>
                <td></td>
                <td>
                  <h5>Cardio</h5>John Deo
                </td>
                <td></td>
                <td>
                  <h5>Crossfit</h5>Adam Phillips
                </td>
                <td></td>
                <td class="bg-dark text-white">
                  <h5 class="text-white">Power Lifting</h5>James Alien
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>

  <?php require_once("footer.php"); ?>
</body>

</html>