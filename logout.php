<?php 

require_once __DIR__ .'/koneksi.php';
$connection = getConnection();

session_start();
session_destroy();

header("location:index.php");
exit();

$connection = null;
?>