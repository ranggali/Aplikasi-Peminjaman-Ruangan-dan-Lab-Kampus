<?php
require_once __DIR__ . '../../koneksi.php';
$connection = getConnection();

session_start();
if ($_SESSION['login'] != true) {
    header('Location:index.php');
    exit();
}

  echo "halo";
    // $status=$_POST['status'];
    $id_user = $_SESSION['id'];
    $id_ruangan = $_POST['id_ruangan'];
    $tanggal = $_POST['tanggal'];
    $tujuan = $_POST['tujuan'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];

    $sql = <<< SQL
    INSERT INTO peminjaman (id_user,id_ruangan,tanggal,waktu_mulai,waktu_selesai,status,tujuan)
    VALUES('$id_user','$id_ruangan','$tanggal','$waktu_mulai','$waktu_selesai','0','$tujuan')
  SQL;
    $success = $connection->query($sql);
    if ($success) {
        header("location:schedules.php");
    } else {
        header("Gagal Menambah Data");
    }

?>