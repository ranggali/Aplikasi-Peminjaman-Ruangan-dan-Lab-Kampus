<?php

require_once __DIR__ . '../../koneksi.php';
$con = getConnection();

$con->query("DELETE FROM peminjaman WHERE id_peminjaman = '$_GET[id]'");
header('Location: schedules.php');
?>