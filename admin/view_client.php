<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php
      remove_error();
      function update($data)
      {
        extract($data);
        $required_fields = array('username', 'email', 'first_name', 'last_name', 'contact', 'city', 'barangay');
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

        $old_password = get_one("SELECT `password` from tbl_user b where id = $id limit 1")->password;
        $new_password = $old_password;
        if (!empty($password) && !empty($re_password)) {
          if ($re_password != $old_password) {
            $_SESSION['error']['re_password'] = true;
            return message_error("Old Password Is Wrong!");
          }
          $new_password = $password;
        }

        $check_user_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_user b where b.username ='$username' and b.id <> $id  and deleted_flag = 0 limit 1");

        if (!empty($check_user_name->res)) {
          $_SESSION['error']['username'] = true;
          return message_error("Username Already In-use!");
        }

        $check_email = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_user b where b.email ='$email' and b.id <> $id  and deleted_flag = 0 limit 1");

        if (!empty($check_email->res)) {
          $_SESSION['error']['email'] = true;
          return message_error("Email Already In-use!");
        }

        $image_name = get_one("select picture from tbl_user_info where id = '$id' limit 1")->picture;
        if ($_FILES['image']['error'] == 0) {
          $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          $image_name = 'image_' . date('YmdHis') . "." . $ext;
          move_uploaded_file($_FILES["image"]["tmp_name"],   '../profile/' . $image_name);
        }

        $medical_certificate = get_one("select medical_certificate from tbl_user_info where id = '$id' limit 1")->medical_certificate;
        if ($_FILES['image2']['error'] == 0) {
          $ext = pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION);
          $medical_certificate = 'image_' . date('YmdHis') . "." . $ext;
          move_uploaded_file($_FILES["image2"]["tmp_name"],   '../medical_certificate/' . $medical_certificate);
        }

        query("UPDATE tbl_user set `username` = '$username', `email` = '$email', `password` = '$new_password', `branch_id` = '$branch' where id = $id");
        query("UPDATE tbl_user_info set `first_name` = '$first_name', `middle_name` = '$middle_name', `last_name` = '$last_name', `gender_id` = '$gender', `contact_no` = '$contact', `picture`='$image_name', barangay = '$barangay', city = '$city','province'='$province' where id = $id");
        return message_success("Client Updated Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update(array_merge($_POST, $_FILES)) : '';  ?>
      <?php
      $id = $_SESSION['user']->id;
      $user = get_one("SELECT tp.*,u.*,ui.*,if(u.plan_expiration_date>curdate(),u.plan_expiration_date, null )  as `plan_expiration_date`,if(u.plan_expiration_date>curdate(),u.client_plan_id, 0 )  as `client_plan_id` FROM tbl_user u inner join tbl_user_info ui on ui.id = u.id left join tbl_client_plan tc on (tc.id = u.client_plan_id and u.plan_expiration_date > curdate()) left join tbl_plan tp on tp.id = tc.plan_id where u.id = "  . $_GET['id']) ?>

      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-eye"></i> View Client
              <a href="clients.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <input type="hidden" id="id" name="id" value="<?= $user->id ?>">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Client Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">

                      <div class="col-sm-3">
                        <div class="form-group">
                          <img src="../profile/<?= isset($_POST['image']) ? $_POST['image'] : $user->picture ?>" alt="" style="width:200px;height:200px;align-self: center;" id="preview">
                        </div>
                      </div>

                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>*First Name</label>
                          <input disabled type="text" class="form-control <?= isset($_SESSION['error']['first_name']) ? 'is-invalid' : '' ?>" id="first_name" name="first_name" placeholder="First Name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : $user->first_name ?>">
                        </div>
                        <div class="form-group">
                          <label>*Province</label>
                          <div style="display: flex;">
                            <select disabled id="province" name="province" style="width:100%" class="form-control <?= isset($_SESSION['error']['province']) ? 'is-invalid' : '' ?>">
                              <?php foreach (get_list("select * from refprovince ") as $res) { ?>
                                <option value="<?= $res['id']; ?>" <?= $user->city == $res['id'] ? 'selected' : '' ?>><?= $res['provDesc']; ?></option>
                              <?php } ?>
                            </select>

                          </div>
                        </div>
                        <div class="form-group">
                          <label>Gender</label>
                          <select disabled id="gender" class="form-control <?= isset($_SESSION['error']['gender']) ? 'is-invalid' : '' ?> custom-select" name="gender">
                            <?php foreach (get_list("select * from tbl_gender where deleted_flag = 0") as $res) { ?>
                              <option value="<?= $res['id']; ?>" <?= ($user->gender_id == $res['id']) ? 'selected' : ''; ?>><?= $res['name']; ?></option>
                            <?php } ?>
                          </select>

                        </div>
                        <div class="form-group">
                          <label>*Contact No#</label>
                          <input disabled type="number" class="form-control <?= isset($_SESSION['error']['contact']) ? 'is-invalid' : '' ?>" id="contact" name="contact" placeholder="Contact No#" value="<?= isset($_POST['contact']) ? $_POST['contact'] : $user->contact_no ?>">

                        </div>
                        <div class="form-group">
                          <label>*New Password</label>
                          <input disabled type="password" class="form-control <?= isset($_SESSION['error']['password']) ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="New Password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">

                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>Middle Name</label>
                          <input disabled type="text" class="form-control <?= isset($_SESSION['error']['middle_name']) ? 'is-invalid' : '' ?>" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?= isset($_POST['middle_name']) ? $_POST['middle_name'] : $user->middle_name ?>">
                        </div>
                        <div class="form-group">
                          <label>*City</label>
                          <select disabled id="city" name="city" style="width:100%" class="form-control <?= isset($_SESSION['error']['city']) ? 'is-invalid' : '' ?>">
                            <?php foreach (get_list("select * from tbl_city where province_id = '0128'") as $res) { ?>
                              <option value="<?= $res['id']; ?>" <?= $user->city == $res['id'] ? 'selected' : '' ?>><?= $res['name']; ?></option>
                            <?php } ?>
                          </select>

                        </div>
                        <div class="form-group">
                          <label>*Email</label>
                          <input disabled type="email" pattern="^[a-zA-Z0-9]+@gmail\.com$" class="form-control <?= isset($_SESSION['error']['email']) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : $user->email ?>">
                        </div>
                        <div class="form-group">
                          <label>*Username</label>
                          <input disabled type="text" class="form-control <?= isset($_SESSION['error']['username']) ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Username" value="<?= isset($_POST['username']) ? $_POST['username'] : $user->username ?>">

                        </div>
                        <div class="form-group">
                          <label>*Old Password</label>
                          <input disabled type="password" class="form-control <?= isset($_SESSION['error']['re_password']) ? 'is-invalid' : '' ?>" id="re_password" name="re_password" placeholder="Old Password" value="<?= isset($_POST['re_password']) ? $_POST['re_password'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label>*Last Name</label>
                          <input disabled type="text" class="form-control <?= isset($_SESSION['error']['last_name']) ? 'is-invalid' : '' ?>" id="last_name" name="last_name" placeholder="Last Name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : $user->last_name ?>">
                        </div>
                        <div class="form-group">
                          <label>*Barangay</label>
                          <select disabled id="barangay" name="barangay" style="" class="form-control <?= isset($_SESSION['error']['barangay']) ? 'is-invalid' : '' ?>">
                            <?php foreach (get_list("select * from tbl_barangay where city_id = " . ($user->city ?? 0) . "") as $res) { ?>
                              <option value="<?= $res['id']; ?>" <?= $user->barangay == $res['id'] ? 'selected' : '' ?>><?= $res['name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Type</label>
                          <input type="text" class="form-control" value="Client" disabled>
                          <input type="hidden" id="access" name="access" value="5">
                        </div>
                        <div class="form-group">
                          <label>Branch</label>
                          <?php if (in_array($_SESSION['user']->access_id, array(1))) { ?>
                            <select disabled id="branch" name="branch" class="form-control <?= isset($_SESSION['error']['branch']) ? 'is-invalid' : '' ?>">
                              <?php foreach (get_list("select b.*,concat(UPPER(b.name) ,' - ', c.name, ' - ', bb.name) as `name` from tbl_branch b left join tbl_barangay bb on bb.id = b.barangay left join tbl_city c on c.id = b.city where b.deleted_flag = 0") as $res) { ?>
                                <option value="<?= $res['id']; ?>" <?= ($user->branch_id == $res['id']) ? 'selected' : ''; ?>><?= $res['name']; ?></option>
                              <?php } ?>
                            </select>
                          <?php } else { ?>
                            <input type="text" class="form-control <?= isset($_SESSION['error']['branch']) ? 'is-invalid' : '' ?>" value="<?= $_SESSION['user']->branch ?>" disabled>
                            <input type="hidden" id="branch" name="branch" value="<?= $_SESSION['user']->branch_id ?>" disabled>
                          <?php } ?>
                        </div>

                      </div>
                    </div>


                    <div class="form-group">
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
<script>
  inputImage = document.getElementById('image');
  preview = document.getElementById('preview');
  inputImage.onchange = evt => {
    const [file] = inputImage.files
    if (file && file['type'].split('/')[0] === 'image') {
      preview.src = URL.createObjectURL(file)
    } else {
      preview.src = '../profile/<?= $user->picture ?>';
    }
  }
  inputImage = document.getElementById('image2');
  preview = document.getElementById('preview2');
  inputImage.onchange = evt => {
    const [file] = inputImage.files
    if (file && file['type'].split('/')[0] === 'image') {
      preview.src = URL.createObjectURL(file)
    } else {
      preview.src = '../medical_certificate/<?= $user->medical_certificate ?>';
    }
  }
</script>
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