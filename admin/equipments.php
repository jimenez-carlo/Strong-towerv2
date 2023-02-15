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
      function delete_user($id)
      {
        query("UPDATE tbl_equipment set `deleted_flag` = 1 where id = $id");
        return message_success("Equipment Deleted Successfully!");
      }
      ?>
      <?php echo (isset($_POST['delete'])) ? delete_user($_POST['delete']) : '';  ?>
      <div class="container-fluid" id="content">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0"><i class="fa fa-dumbbell"></i> Equipments</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
              <thead>
                <tr>
                  <!-- <th>ID#</th> -->
                  <th>Image</th>
                  <th>Enabled/Disabled</th>
                  <th>Equipement name</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $where = ($_SESSION['user']->access_id == 1) ? "" : " and  branch_id = " . $_SESSION['user']->branch_id  ?>
                <?php foreach (get_list("select * from tbl_equipment where deleted_flag = 0 $where") as $res) { ?>
                  <tr>
                    <!-- <td><?php echo $res['id']; ?></td> -->
                    <td><img src="../equipments/<?php echo $res['image']; ?>" style="width:100px;height:100px;object-fit:contain"></td>
                    <td><?php echo ($res['enabled'] == 1) ? 'Enabled' : 'Disabled'; ?></td>
                    <td><?php echo ucfirst($res['name']); ?></td>
                    <td><?php echo $res['description']; ?></td>
                    <?php if (in_array($_SESSION['user']->access_id, array(2))) { ?>
                      <td>
                        <form method="post" onsubmit="return confirm('Are You Sure?');">
                          <a href="edit_equipment.php?id=<?= $res['id']; ?>" class="btn btn-sm btn-dark"> Edit <i class="fa fa-edit"></i> </a>
                          <button type="submit" class="btn btn-sm btn-danger" name="delete" value="<?php echo $res['id']; ?>"> Delete <i class="fa fa-trash"></i> </button>
                        </form>
                      </td>
                    <?php } else { ?>
                      <td>
                        <a href="view_equipment.php?id=<?= $res['id']; ?>" class="btn btn-sm btn-dark"> View <i class="fa fa-eye"></i> </a>

                      </td>
                    <?php }  ?>
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
      <?php if (in_array($_SESSION['user']->access_id, array(2))) { ?> {
          className: 'btn btn-sm btn-dark',
          text: '<i class="fa fa-user-plus"></i> Add Equipment',
          action: function(e, dt, node, config) {
            window.location = 'create_equipment.php';
          }
        }
      <?php } ?>
    ]
  });
</script>