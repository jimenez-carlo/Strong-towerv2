<?php

function escape_data($data = array())
{
  foreach ($data as $key => $value) {
    if (is_array($value) || is_object($value)) {
      continue;
    } else {
      $value = trim($value);
      $value = stripslashes($value);
      $value = htmlspecialchars($value);
      $data[$key] = mysqli_real_escape_string($_SESSION['conn'], $value);
    }
    return $data;
  }
}

function get_list($sql)
{
  $data = array();
  $result = mysqli_query($_SESSION['conn'], $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  return $data;
}

function get_one($sql)
{
  if ($result = mysqli_query($_SESSION['conn'], $sql)) {
    $obj = mysqli_fetch_object($result);
    return $obj;
  }
  return false;
}

function query($sql)
{
  mysqli_query($_SESSION['conn'], $sql);
}

function insert_get_id($sql)
{
  mysqli_query($_SESSION['conn'], $sql);
  return mysqli_insert_id($_SESSION['conn']);
}

function message_error($message = "Oops Something Went Wrong!", $title = "Error!")
{
  return sprintf(
    '<div class="alert alert-sm alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-ban"></i> <strong>%s</strong> %s </div>',
    $title,
    $message
  );
}

function message_success($message = "Action Successfull!", $title = "Success!")
{
  return sprintf(
    '<div class="alert alert-success alert-dismissible" >
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="fa fa-check"></i> <strong>%s</strong> %s </div>',
    $title,
    $message
  );
}

function remove_error()
{
  $_SESSION['error'] = array();
}
