<?php

require_once __DIR__ . '../../koneksi.php';
$con = getConnection();

$con->query("UPDATE peminjaman SET status ='1' WHERE id_peminjaman = '$_GET[id]'");
$con->query("UPDATE ruangan SET status ='0' WHERE id_ruangan = '$_GET[ruangan]'");
header('Location: schedules.php');
?>