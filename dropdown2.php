<?php
require_once('functions.php');
require_once('database/conn.php');
extract($_GET);

foreach (get_list("SELECT * from tbl_city where province_id = '$province'") as $res) {
  echo '<option value="' . $res['id'] . '">' . $res['name'] . '</option>';
}
