<?php
require_once __DIR__ .'../../koneksi.php';
$connection = getConnection();

session_start();
if($_SESSION['login'] != true){
  header('Location:index.php');
  exit();
}

$nim_mhs = $_SESSION['username'];

$username=$_POST['username'];
$nama_lengkap=$_POST['nama_lengkap'];
$id_user=$_POST['id_user'];
$password=$_POST['password'];
$prodi=$_POST['prodi'];

$sql = <<< SQL
  INSERT INTO user(id_user,nama_lengkap,username,password,prodi)
  VALUES('$id_user','$nama_lengkap','$username','$password','$prodi')
SQL;
$success = $connection->query($sql);
if($success){
    header("location:tambah_user.php");
}else{
    header("Gagal Menambah Data");
}


?>
