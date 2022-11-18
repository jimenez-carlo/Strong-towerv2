<?php
require_once('../database/conn.php');
session_destroy();
header('location:index.php');
