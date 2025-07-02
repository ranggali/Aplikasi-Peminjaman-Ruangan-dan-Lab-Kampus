<?php
require_once __DIR__ .'../../koneksi.php';
$connection = getConnection();

session_start();
if($_SESSION['login'] != true){
  header('Location:index.php');
  exit();
}

$nim_mhs = $_SESSION['username'];

if(isset($_POST['submit'])){

  // $status=$_POST['status'];
  $kode_ruangan=$_POST['kode_ruangan'];
  $nama_ruangan=$_POST['nama_ruangan'];
  $lantai=$_POST['lantai'];
  $id = $_POST['id'];
  
  $sql = <<< SQL
    UPDATE ruangan SET kode_ruangan = '$kode_ruangan', nama_ruangan = '$nama_ruangan', lantai = '$lantai' WHERE id_ruangan = '$id'
  SQL;
  $success = $connection->query($sql);
  if($success){
      header("location:infoRuang.php");
  }else{
      header("Gagal Menambah Data");
  }


}

?>

<!-- // $status=$_POST['status'];
// $kode_ruangan=$_POST['kode'];
// $nama_ruangan=$_POST['nama'];
// $lantai=$_POST['lantai'];

// $sql = <<< SQL
//   INSERT INTO ruangan (status,kode_ruangan,nama_ruangan,lantai)
//   VALUES('1','$kode_ruangan','$nama_ruangan','$lantai')
// SQL;
// $success = $connection->query($sql);
// if($success){
//     header("location:tambah_ruang.php");
// }else{
//     header("Gagal Menambah Data");
// } -->


