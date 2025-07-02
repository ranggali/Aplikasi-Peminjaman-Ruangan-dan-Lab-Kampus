<?php

require_once __DIR__ . '../../koneksi.php';
$con = getConnection();

$sql= ("DELETE FROM user WHERE id_user = '$_GET[id]'");
$success = $con->query($sql);
if($success){
    header("location: tambah_user.php");
}else{
    header("Gagal Menambah Data");
}
?>