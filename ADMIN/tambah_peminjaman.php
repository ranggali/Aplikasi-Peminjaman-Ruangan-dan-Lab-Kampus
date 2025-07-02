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
    $id_admin = $_SESSION['id'];
    $id_user = $_POST['id_user'];
    $id_ruangan = $_POST['id_ruangan'];
    $tanggal = $_POST['tanggal'];
    $tujuan = $_POST['tujuan'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];

    $sql = <<< SQL
    INSERT INTO peminjaman (id_user,id_admin,id_ruangan,tanggal,waktu_mulai,waktu_selesai,status,tujuan)
    VALUES('$id_user','$id_admin','$id_ruangan','$tanggal','$waktu_mulai','$waktu_selesai','1','$tujuan')
  SQL;
    $success = $connection->query($sql);
    $sql = <<< SQL
    UPDATE ruangan SET status='0' WHERE id_ruangan='$id_ruangan'
  SQL;
    $connection->query($sql);
    if ($success) {
        header("location:LoanDone.php");
    } else {
        header("Gagal Menambah Data");
    }
}

?>