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
  $username=$_POST['username'];
  $nama_lengkap=$_POST['nama'];
  $id_user =$_POST['id_user'];
  $password=$_POST['pass'];
  $prodi=$_POST['prodi'];
  
  $sql = <<< SQL
    UPDATE user SET username = '$username', nama_lengkap = '$nama_lengkap', password = '$password', prodi = '$prodi' WHERE id_user = '$id_user'
  SQL;
  $success = $connection->query($sql);
  if($success){
      header("location:tambah_user.php");
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


