<?php include('header.php'); ?>
<link rel="stylesheet" href="../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php
      function add_stock($data)
      {
        extract($data);
        $created_by = $_SESSION['user']->id;
        $new_qty = $original_qty + $qty;
        query("UPDATE tbl_supplements set qty = $new_qty where id = $supplement_id");
        query("INSERT into tbl_supplement_inventory (supplement_id,original_qty, qty, created_by) values('$supplement_id','$original_qty','$qty', '$created_by')");
        return message_success("Stock Updated Successfully!");
      }
      ?>
      <?php echo (isset($_POST['add_stock'])) ? add_stock($_POST) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-box"></i> Inventory</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
              <thead>
                <tr>
                  <!-- <th>ID#</th> -->
                  <th>Supplement name</th>
                  <th>Stock</th>
                  <th>Price</th>
                  <?php if (in_array($_SESSION['user']->access_id, array(1, 2))) { ?>
                    <th>Actions</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach (get_list("select * from tbl_supplements where deleted_flag = 0") as $res) { ?>
                  <tr>
                    <!-- <td><?php echo $res['id']; ?></td> -->
                    <td><?php echo ucfirst($res['name']); ?></td>
                    <td><?php echo $res['qty'] ?></td>
                    <td class="text-right"><?php echo number_format($res['price'], 2); ?></td>
                    <?php if (in_array($_SESSION['user']->access_id, array(1, 2))) { ?>
                      <td>
                        <form method="post" onsubmit="return confirm('Are You Sure?');">
                          <div class="input-group mb-3">
                            <input type="hidden" name="supplement_id" value="<?php echo $res['id'] ?>">
                            <input type="hidden" name="original_qty" value="<?php echo $res['qty'] ?>">
                            <input type="number" class="form-control rounded-0" name="qty" value="0" style="width:10px">
                            <span class="input-group-append">
                              <button type="submit" class="btn btn-dark btn-sm" name="add_stock">Add Stock</button>
                              <a href="inventory_view.php?id=<?php echo $res['id']; ?>" style="padding-top:7px" class="btn btn-dark btn-sm">View</a>
                            </span>
                          </div>
                        </form>
                      </td>
                    <?php } ?>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>


        </div>

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<?php include('footer.php'); ?>
<script src="../adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/jszip/jszip.min.js"></script>
<script src="../adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $('table').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    dom: '<"top"<"left-col"B><"center-col"><"right-col"f>> <"row"<"col-sm-12"tr>><"row"<"col-sm-10"li><"col-sm-2"p>>',
    buttons: [

    ]
  });
</script>