<?php

require_once __DIR__ . '../../koneksi.php';
$con = getConnection();

$con->query("DELETE FROM ruangan WHERE id_ruangan = '$_GET[id]'");
header('Location: infoRuang.php');
?>