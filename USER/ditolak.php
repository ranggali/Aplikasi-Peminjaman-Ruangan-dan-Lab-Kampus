<?php

require_once __DIR__ . '../../koneksi.php';
$con = getConnection();

$con->query("UPDATE peminjaman SET status ='3' WHERE id_peminjaman = '$_GET[id]'");
?>