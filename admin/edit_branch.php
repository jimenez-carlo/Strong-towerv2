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
        $required_fields = array('name', 'description');
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

        $check_branch_name = get_one("SELECT if(max(b.id) is null, 0, max(b.id) + 1) as `res` from tbl_branch b where b.name ='$name' and id <> $id  and deleted_flag = 0 limit 1");

        if (!empty($check_branch_name->res)) {
          $_SESSION['error']['name'] = true;
          return message_error("Branch Name Already In-use!");
        }

        query("UPDATE tbl_branch set `name` = '$name', `description` = '$description',`barangay`='$barangay',`city`='$city',`contact_no`= '$contact', `email`='$email',`google_map`='$map' where id = $id");
        return message_success("Branch Updated Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['update'])) ? update($_POST) : '';  ?>
      <?php $branch = get_one("select * from tbl_branch where id =" . $_GET['id']) ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-edit"></i> Edit Branch #<?= $branch->id ?>
              <a href="branches.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $branch->id ?>">
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
                      <input type="text" class="form-control <?= isset($_SESSION['error']['name']) ? 'is-invalid' : '' ?>" id="name" name="name" placeholder="Branch Name" value="<?= isset($_POST['name']) ? $_POST['name'] : $branch->name ?>">
                    </div>
                    <div class="form-group">
                      <label>*City & Barangay</label>
                      <div style="display: flex;">
                        <select id="city" name="city" style="width:50%" class="form-control <?= isset($_SESSION['error']['city']) ? 'is-invalid' : '' ?>">
                          <?php foreach (get_list("select * from tbl_city") as $res) { ?>
                            <option value="<?= $res['id']; ?>" <?= $branch->city == $res['id'] ? 'selected' : '' ?>><?= $res['name']; ?></option>
                          <?php } ?>
                        </select>
                        <select id="barangay" name="barangay" style="width:50%;float:right" class="form-control <?= isset($_SESSION['error']['barangay']) ? 'is-invalid' : '' ?>">
                          <?php foreach (get_list("select * from tbl_barangay where city_id = " . $branch->city . "") as $res) { ?>
                            <option value="<?= $res['id']; ?>" <?= $branch->barangay == $res['id'] ? 'selected' : '' ?>><?= $res['name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">*Branch Contact</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['contact']) ? 'is-invalid' : '' ?>" id="contact" name="contact" placeholder="Branch Contact" value="<?= isset($_POST['contact']) ? $_POST['contact'] : $branch->contact_no ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Branch Email</label>
                      <input type="text" class="form-control <?= isset($_SESSION['error']['email']) ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Branch Email" value="<?= isset($_POST['email']) ? $_POST['email'] : $branch->email ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Branch Map</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['map']) ? 'is-invalid' : '' ?>" rows="4" id="map" name="map" placeholder="Branch Map"><?= isset($_POST['map']) ? $_POST['description'] : $branch->google_map ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">*Branch Description</label>
                      <textarea class="form-control <?= isset($_SESSION['error']['description']) ? 'is-invalid' : '' ?>" rows="4" id="description" name="description" placeholder="Branch Description"><?= isset($_POST['description']) ? $_POST['description'] : $branch->description ?></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-dark float-right" name="update"><i class="fa fa-save"></i> Update</button>
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
  $(document).on("change", "#city", function() {
    let value = $(this).val();
    $.get("../dropdown.php?city=" + value, function(result) {
      $("#barangay").html(result);
    });
  });
</script>