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
        $required_fields = array('supplement_id', 'amount');
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

        $branch_id = isset($branch) ? $branch : $_SESSION['user']->branch_id;
        $product = get_one("SELECT b.price,b.qty from tbl_supplements b where b.id ='$supplement_id' and b.deleted_flag = 0  and b.branch_id = '$branch_id' limit 1");

        if (!empty($product->price) && ($product->price * $product->qty) < $amount) {
          $_SESSION['error']['amount'] = true;
          return message_error("Amount is less than Price(" . number_format($product->price * $product->qty, 2) . ")!");
        }

        if (!empty($product->qty) && ($qty > $product->qty)) {
          $_SESSION['error']['qty'] = true;
          return message_error("Total Quantity is greater than available stock(" . $product->qty . ")!");
        }

        try {
          $change = $product->price * $product->qty - $amount;
          //code...
          // $id = insert_get_id("INSERT INTO tbl_supplements (`name`,`description`, price,`image`,`expiration_date`,`branch_id`) VALUES('$supplement', '$description','$price','$image_name','$expiration','$branch_id')");
          $id = insert_get_id("INSERT INTO tbl_supplement_sell (`supplement_id`,`qty`, amount, `change`) VALUES('$supplement_id', '$qty', '$amount','$change')");
          query("UPDATE tbl_supplements set `qty`= qty-$qty where id = $supplement_id");
          query("INSERT into tbl_supplement_inventory (supplement_id, original_qty, qty, created_by) values($supplement_id, $product->qty, -$qty,'" . $_SESSION['user']->id . "' )");
        } catch (\Throwable $th) {
        }
        //throw $th;
        unset($_POST);
        return message_success("Supplement Sold Successfully!", 'Successfull!');
      }
      ?>
      <?php echo (isset($_POST['create'])) ? create(array_merge($_POST, $_FILES)) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-usd"></i> Sell Supplement
              <a href="supplements.php" class="btn btn-dark" style="float:right">Back</a>
            </h1>
          </div><!-- /.col -->
        </div>
        <form method="post" onsubmit="return confirm('Are You Sure?');" enctype="multipart/form-data">
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Transaction Details</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
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

                    <div class="form-group">
                      <label for="">*Supplement - Price - Stock</label>
                      <select name="supplement_id" id="" class="form-control">
                        <?php
                        $branch = $_SESSION['user']->branch_id == 1 ? " " : " and s.branch_id =" . $_SESSION['user']->branch_id;
                        ?>
                        <?php foreach (get_list("select s.* from tbl_supplements s  where s.deleted_flag = 0 $branch") as $res) { ?>
                          <option value="<?= $res['id'] ?>"><?= $res['name'] . ' - ' . number_format($res['price'], 2) . ' - ' . $res['qty'] ?> qty</option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">*Qty</label>
                      <input type="number" required class="form-control <?= isset($_SESSION['error']['qty']) ? 'is-invalid' : '' ?>" id="qty" name="qty" placeholder="1" value="<?= isset($_POST['qty']) ? $_POST['qty'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="">*Amount</label>
                      <input type="number" required class="form-control <?= isset($_SESSION['error']['amount']) ? 'is-invalid' : '' ?>" id="amount" name="amount" placeholder="100.00" value="<?= isset($_POST['amount']) ? $_POST['amount'] : '' ?>">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-dark float-right" name="create"><i class="fa fa-save"></i> Create Sale</button>
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