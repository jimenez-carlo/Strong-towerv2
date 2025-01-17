<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php
      remove_error();
      function create($data)
      {
        extract($data);
        $required_fields = array('branch', 'description', 'province', 'city', 'barangay');
        $errors = 0;
        foreach ($required_fields as $res) {
          if (empty(${$res})) {
            $_SESSION['error'][$res] = true;
            $errors++;
          }
        }

        if (!empty($errors)) {
          return message_error("Please Fill Blank Fields!");
        }

        $check_branch_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_branch b where b.name ='$branch' and deleted_flag = 0 limit 1");

        if (!empty($check_branch_name->res)) {
          $_SESSION['error']['branch'] = true;
          return message_error("Branch Name Already In-use!");
        }
        query("INSERT INTO tbl_branch (`name`,`description`,`contact_no`,`email`,`google_map`,`city`,`barangay`,`province`) VALUES('$branch', '$description','$contact','$email','$map','$city','$barangay','$province')");
        unset($_POST);
        return message_success("Branch Created Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['create'])) ? create(array_merge($_POST, $_FILES)) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-store"></i> Add Branch
              <a href="branches.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Branch Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">*Branch Name</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['branch']) ? 'is-invalid' : '' ?>" id="branch" name="branch" placeholder="Branch Name" value="<?= isset($_POST['branch']) ? $_POST['branch'] : '' ?>">
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>*Province</label>
                          <div style="display: flex;">
                            <select id="province" name="province" style="" class="form-control <?= isset($_SESSION['error']['province']) ? 'is-invalid' : '' ?>">
                              <?php foreach (get_list("select * from refprovince") as $res) { ?>
                                <option value="<?= $res['id']; ?>"><?= $res['provDesc']; ?></option>
                              <?php } ?>
                            </select>

                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>*City</label>
                          <div style="display: flex;">

                            <select id="city" name="city" style="" class="form-control <?= isset($_SESSION['error']['city']) ? 'is-invalid' : '' ?>">
                              <?php foreach (get_list("select * from tbl_city where province_id = '0128'") as $res) { ?>
                                <option value="<?= $res['id']; ?>"><?= $res['name']; ?></option>
                              <?php } ?>
                            </select>

                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>*Barangay</label>

                          <select id="barangay" name="barangay" style=";float:right" class="form-control <?= isset($_SESSION['error']['barangay']) ? 'is-invalid' : '' ?>">
                            <?php foreach (get_list("select * from tbl_barangay where  city_id = 012801") as $res) { ?>
                              <option value="<?= $res['id']; ?>"><?= $res['name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">*Branch Contact</label>
                      <input type="number" class="form-control <?= isset($_SESSION['error']['contact']) ? 'is-invalid' : '' ?>" id="contact" name="contact" placeholder="Branch Contact" value="<?= isset($_POST['contact']) ? $_POST['contact'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Branch Email</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['email']) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Branch Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Branch Map</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['map']) ? 'is-invalid' : '' ?>" rows="4" id="map" name="map" placeholder="Branch Map"><?= isset($_POST['map']) ? $_POST['map'] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">*Branch Description</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Branch Description"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-dark float-right" name="create"><i class="fa fa-save"></i> Add Branch</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<?php include('footer.php'); ?>
<script>
  $(document).on("change", "#province", function() {
    const province = $(this).val();
    $.get("../dropdown2.php?province=" + province, function(result) {
      $("#city").html(result).trigger("change");
    });
  });

  $(document).on("change", "#city", function() {
    let value = $(this).val();
    $.get("../dropdown.php?city=" + value, function(result) {
      $("#barangay").html(result);
    });
  });
</script>