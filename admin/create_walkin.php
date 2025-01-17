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
        $required_fields = array('first_name', 'last_name', 'contact', 'price_raw', 'date');
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


        $id = $_SESSION['user']->id;
        $branch_id = isset($branch) ? $branch : $_SESSION['user']->branch_id;

        // query("INSERT INTO tbl_walkin (`first_name`,`middle_name`,`last_name`,`price`,`contact_no`,`created_by`,`date`,`branch_id`) VALUES('$first_name', '$middle_name','$last_name','$price','$contact','$id','$date','$branch_id')");
        query("INSERT INTO tbl_walkin (`first_name`,`middle_name`,`last_name`,`price_raw`,`contact_no`,`created_by`,`date`,`branch_id`) VALUES('$first_name', '$middle_name','$last_name','$price_raw','$contact','$id','$date','$branch_id')");
        unset($_POST);
        return message_success("Walkin Created Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['create'])) ? create(array_merge($_POST, $_FILES)) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-user-plus"></i> Add Walkin
              <a href="walkin.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Service Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">*First Name</label>
                          <input type="text" class="form-control <?= isset($_SESSION['error']['first_name']) ? 'is-invalid' : '' ?>" id="first_name" name="first_name" placeholder="First Name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">*Middle Name</label>
                          <input type="text" class="form-control <?= isset($_SESSION['error']['middle_name']) ? 'is-invalid' : '' ?>" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?= isset($_POST['middle_name']) ? $_POST['middle_name'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">*Last Name</label>
                          <input type="text" class="form-control <?= isset($_SESSION['error']['last_name']) ? 'is-invalid' : '' ?>" id="last_name" name="last_name" placeholder="Last Name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">*Contact No</label>
                          <input type="number" class="form-control <?= isset($_SESSION['error']['contact']) ? 'is-invalid' : '' ?>" id="contact" name="contact" placeholder="Contact No" value="<?= isset($_POST['contact']) ? $_POST['contact'] : '' ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">*Price</label>
                          <!-- <input type="number" class="form-control <?= isset($_SESSION['error']['price']) ? 'is-invalid' : '' ?>" id="price" name="price" placeholder="Price" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>"> -->

                          <input type="number" class="form-control <?= isset($_SESSION['error']['price_raw']) ? 'is-invalid' : '' ?>" id="price_raw" name="price_raw" placeholder="50.00" value="<?= isset($_POST['price_raw']) ? $_POST['price_raw'] : '' ?>">
                          <!-- <select name="price" id="" class="form-control">
                            <?php $where_branch = $_SESSION['user']->access_id == 1 ? '' : ' and branch_id = ' . $_SESSION['user']->branch_id ?>
                            <?php foreach (get_list("select * from tbl_plan where deleted_flag = 0 $where_branch") as $res) { ?>
                              <option value="<?= $res['per_month'] ?>"><?= $res['name'] . ' ' . number_format($res['per_month'], 2) ?></option>
                            <?php } ?>
                          </select> -->
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">*Date</label>
                          <input type="date" class="form-control <?= isset($_SESSION['error']['date']) ? 'is-invalid' : '' ?>" id="date" name="date" placeholder="Date" value="<?= isset($_POST['date']) ? $_POST['date'] : '' ?>">
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <?php if ($_SESSION['user']->access_id == 1) { ?>
                        <div class="form-group">
                          <label for="">*Branch</label>
                          <select name="branch" id="" class="form-control">
                            <?php foreach (get_list("select b.*,concat(UPPER(b.name) ,' - ', c.name, ' - ', bb.name) as `name` from tbl_branch b left join tbl_barangay bb on bb.id = b.barangay left join tbl_city c on c.id = b.city where b.deleted_flag = 0") as $res) { ?>
                              <option value="<?= $res['id'] ?>"><?= $res['name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      <?php } ?>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-dark float-right" name="create"><i class="fa fa-save"></i> Add Walkin</button>
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
      preview.src = '../services/default.png';
    }
  }
</script>
<?php include('footer.php'); ?>