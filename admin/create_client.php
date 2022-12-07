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
        $required_fields = array('username', 'email', 'password', 're_password', 'first_name', 'middle_name', 'last_name', 'contact');
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

        if ($password != $re_password) {
          $_SESSION['error']['password'] = true;
          $_SESSION['error']['re_password'] = true;
          return message_error("Password Doest Not Match!");
        }

        $check_user_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_user b where b.username ='$username' and deleted_flag = 0 limit 1");

        if (!empty($check_user_name->res)) {
          $_SESSION['error']['username'] = true;
          return message_error("Username Already In-use!");
        }

        $check_email = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_user b where b.email ='$email' and deleted_flag = 0 limit 1");

        if (!empty($check_email->res)) {
          $_SESSION['error']['email'] = true;
          return message_error("Email Already In-use!");
        }

        $image_name = 'default.png';
        if ($_FILES['image']['error'] == 0) {
          $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          $image_name = 'image_' . date('YmdHis') . $ext;
          move_uploaded_file($_FILES["image"]["tmp_name"],   '../profile/' . $image_name);
        }

        $id = insert_get_id("INSERT INTO tbl_user (`username`,`email`,`password`,branch_id,access_id) VALUES('$username', '$email','$password','$branch','$access')");
        query("INSERT INTO tbl_user_info (id,first_name,middle_name,last_name,gender_id,contact_no,`address`,`picture`) VALUES('$id','$first_name','$middle_name','$last_name','$gender','$contact','$address','$image_name')");
        unset($_POST);
        return message_success("Client Created Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['create'])) ? create(array_merge($_POST, $_FILES)) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-user-plus"></i> Assign Client Plan</h1>
          </div><!-- /.col -->
        </div>
        <form method="post" enctype="multipart/form-data">
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
                      <div class="col-sm-4">
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          
                          <img src="../profile/default.png" alt="" style="width:200px;height:200px;align-self: center;" id="preview">
                          <input type="file" class="form-control" id="image" name="image" accept="image/*" style="border: unset;">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Username</label>
                          <input type="text" class="form-control <?= isset($_SESSION['error']['username']) ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Email</label>
                          <input type="email" class="form-control <?= isset($_SESSION['error']['email']) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Branch</label>
                          <?php if (in_array($_SESSION['user']->access_id, array(1))) { ?>
                            <select id="branch" name="branch" class="form-control <?= isset($_SESSION['error']['branch']) ? 'is-invalid' : '' ?>">
                              <?php foreach (get_list("select * from tbl_branch where deleted_flag = 0") as $res) { ?>
                                <option value="<?= $res['id']; ?>"><?= $res['name']; ?></option>
                              <?php } ?>
                            </select>
                          <?php } else { ?>
                            <input type="text" class="form-control <?= isset($_SESSION['error']['branch']) ? 'is-invalid' : '' ?>" value="<?= $_SESSION['user']->branch ?>" disabled>
                            <input type="hidden" id="branch" name="branch" value="<?= $_SESSION['user']->branch_id ?>" disabled>
                          <?php } ?>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Password</label>
                          <input type="password" class="form-control <?= isset($_SESSION['error']['password']) ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Re-type Password</label>
                          <input type="password" class="form-control <?= isset($_SESSION['error']['re_password']) ? 'is-invalid' : '' ?>" id="re_password" name="re_password" placeholder="Re-type Password" value="<?= isset($_POST['re_password']) ? $_POST['re_password'] : '' ?>">
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Type</label>
                          <input type="text" class="form-control" value="Client" disabled>
                          <input type="hidden" id="access" name="access" value="5">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*First Name</label>
                          <input type="text" class="form-control <?= isset($_SESSION['error']['first_name']) ? 'is-invalid' : '' ?>" id="first_name" name="first_name" placeholder="First Name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Middle Name</label>
                          <input type="text" class="form-control <?= isset($_SESSION['error']['middle_name']) ? 'is-invalid' : '' ?>" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?= isset($_POST['middle_name']) ? $_POST['middle_name'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Last Name</label>
                          <input type="text" class="form-control <?= isset($_SESSION['error']['last_name']) ? 'is-invalid' : '' ?>" id="last_name" name="last_name" placeholder="Last Name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Gender</label>
                          <select id="gender" class="form-control <?= isset($_SESSION['error']['gender']) ? 'is-invalid' : '' ?> custom-select" name="gender">
                            <?php foreach (get_list("select * from tbl_gender where deleted_flag = 0") as $res) { ?>
                              <option value="<?= $res['id']; ?>"><?= $res['name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Contact No#</label>
                          <input type="number" class="form-control <?= isset($_SESSION['error']['contact']) ? 'is-invalid' : '' ?>" id="contact" name="contact" placeholder="Contact No#" value="<?= isset($_POST['contact']) ? $_POST['contact'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Address</label>
                          <textarea class="form-control <?= isset($_SESSION['error']['address']) ? 'is-invalid' : '' ?>" rows="4" id="address" name="address" placeholder="Address"><?= isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-dark float-right" name="create"><i class="fa fa-save"></i> Register Client</button>
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
      preview.src = '../profile/default.png';
    }
  }
</script>
<?php include('footer.php'); ?>