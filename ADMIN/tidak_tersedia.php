<?php

require_once __DIR__ . '../../koneksi.php';
$con = getConnection();

$con->query("UPDATE ruangan SET status ='0' WHERE id_ruangan = '$_GET[id]'");
?>