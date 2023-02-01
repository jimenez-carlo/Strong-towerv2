<?php include('header.php'); ?>
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php
      $id = $_SESSION['user']->id;
      $user = get_one("SELECT tp.*,u.*,ui.*,if(u.plan_expiration_date>curdate(),u.plan_expiration_date, null )  as `plan_expiration_date`,if(u.plan_expiration_date>curdate(),u.client_plan_id, 0 )  as `client_plan_id` FROM tbl_user u inner join tbl_user_info ui on ui.id = u.id left join tbl_client_plan tc on (tc.id = u.client_plan_id and u.plan_expiration_date > curdate()) left join tbl_plan tp on tp.id = tc.plan_id where u.id = "  . $_GET['id']) ?>

      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> View Client #<?= $user->id ?>
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
                      <div class="col-sm-4">
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">

                          <img src="../profile/<?= isset($_POST['image']) ? $_POST['image'] : $user->picture ?>" alt="" style="width:200px;height:200px;align-self: center;" id="preview">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Username</label>
                          <input disabled type="text" class="form-control <?= isset($_SESSION['error']['username']) ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Username" value="<?= isset($_POST['username']) ? $_POST['username'] : $user->username ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Email</label>
                          <input disabled type="email" class="form-control <?= isset($_SESSION['error']['email']) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? $_POST['email'] : $user->email ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Branch</label>
                          <?php if (in_array($_SESSION['user']->access_id, array(1))) { ?>
                            <select disabled id="branch" name="branch" class="form-control <?= isset($_SESSION['error']['branch']) ? 'is-invalid' : '' ?>">
                              <?php foreach (get_list("select * from tbl_branch where deleted_flag = 0") as $res) { ?>
                                <option value="<?= $res['id']; ?>" <?= ($user->branch_id == $res['id']) ? 'selected' : ''; ?>><?= $res['name']; ?></option>
                              <?php } ?>
                            </select>
                          <?php } else { ?>
                            <input disabled type="text" class="form-control <?= isset($_SESSION['error']['branch']) ? 'is-invalid' : '' ?>" value="<?= $_SESSION['user']->branch ?>" disabled>
                            <input disabled type="hidden" id="branch" name="branch" value="<?= $_SESSION['user']->branch_id ?>" disabled>
                          <?php } ?>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Old Password</label>
                          <input disabled type="password" class="form-control <?= isset($_SESSION['error']['re_password']) ? 'is-invalid' : '' ?>" id="re_password" name="re_password" placeholder="Old Password" value="<?= isset($_POST['re_password']) ? $_POST['re_password'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*New Password</label>
                          <input disabled type="password" class="form-control <?= isset($_SESSION['error']['password']) ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="New Password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Type</label>
                          <input disabled type="text" class="form-control" value="Client" disabled>
                          <input disabled type="hidden" id="access" name="access" value="5">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*First Name</label>
                          <input disabled type="text" class="form-control <?= isset($_SESSION['error']['first_name']) ? 'is-invalid' : '' ?>" id="first_name" name="first_name" placeholder="First Name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : $user->first_name ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Middle Name</label>
                          <input disabled type="text" class="form-control <?= isset($_SESSION['error']['middle_name']) ? 'is-invalid' : '' ?>" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?= isset($_POST['middle_name']) ? $_POST['middle_name'] : $user->middle_name ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Last Name</label>
                          <input disabled type="text" class="form-control <?= isset($_SESSION['error']['last_name']) ? 'is-invalid' : '' ?>" id="last_name" name="last_name" placeholder="Last Name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : $user->last_name ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>Gender</label>
                          <select disabled id="gender" class="form-control <?= isset($_SESSION['error']['gender']) ? 'is-invalid' : '' ?> custom-select" name="gender">
                            <?php foreach (get_list("select * from tbl_gender where deleted_flag = 0") as $res) { ?>
                              <option value="<?= $res['id']; ?>" <?= ($user->gender_id == $res['id']) ? 'selected' : ''; ?>><?= $res['name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*Contact No#</label>
                          <input disabled type="number" class="form-control <?= isset($_SESSION['error']['contact']) ? 'is-invalid' : '' ?>" id="contact" name="contact" placeholder="Contact No#" value="<?= isset($_POST['contact']) ? $_POST['contact'] : $user->contact_no ?>">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label>*City & Barangay</label>
                          <div style="display: flex;">
                            <select disabled id="city" name="city" style="width:50%" class="form-control <?= isset($_SESSION['error']['city']) ? 'is-invalid' : '' ?>">
                              <?php foreach (get_list("select * from tbl_city") as $res) { ?>
                                <option value="<?= $res['id']; ?>" <?= $user->city == $res['id'] ? 'selected' : '' ?>><?= $res['name']; ?></option>
                              <?php } ?>
                            </select>
                            <select disabled id="barangay" name="barangay" style="width:50%;float:right" class="form-control <?= isset($_SESSION['error']['barangay']) ? 'is-invalid' : '' ?>">
                              <?php foreach (get_list("select * from tbl_barangay where city_id = " . $user->city . "") as $res) { ?>
                                <option value="<?= $res['id']; ?>" <?= $user->barangay == $res['id'] ? 'selected' : '' ?>><?= $res['name']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
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

<?php include('footer.php'); ?>