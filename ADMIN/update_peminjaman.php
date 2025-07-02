<?php
require_once __DIR__ . '../../koneksi.php';
$connection = getConnection();

session_start();
if ($_SESSION['login'] != true) {
    header('Location:index.php');
    exit();
}

$nim_mhs = $_SESSION['username'];

if (isset($_POST['submit'])) {

    // $status=$_POST['status'];
    $tanggal = $_POST['tanggal'];
    $tujuan = $_POST['tujuan'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];
    $id = $_POST['id_peminjaman'];

    $sql = <<< SQL
    UPDATE peminjaman SET tanggal='$tanggal',tujuan='$tujuan',waktu_mulai='$waktu_mulai',waktu_selesai='$waktu_selesai' WHERE id_peminjaman='$id'
  SQL;
  $success = $connection->query($sql);
    if ($success) {
        header("location:LoanDone.php");
    } else {
        header("Gagal Menambah Data");
    }
}

?>