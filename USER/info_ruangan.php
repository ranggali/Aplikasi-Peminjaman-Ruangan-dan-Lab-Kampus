<?php
require_once __DIR__ .'../../koneksi.php';  
$connection = getConnection();
session_start();
$nim_mhs = $_SESSION['username'];
$sql = <<<SQL
    SELECT * FROM ruangan
SQL;
$statement = $connection->query($sql);                            
$nomor=1;
foreach($statement as $row ){
    $status=$row['status'];
    $kode_ruangan=$row['kode_ruangan'];
    $nama_ruangan=$row['nama_ruangan'];
    $lantai=$row['lantai'];
    if($status==0){
        echo"
        <tr>
            <td>$nomor</td>
            <td>$kode_ruangan</td>
            <td>$nama_ruangan</td>
            <td>$lantai</td>
            <td>Tidak Tersedia</td>
            
        </tr>
        ";
        $nomor +=1;

    }

}
$sql = <<<SQL
    SELECT * FROM ruangan
SQL;
$statement = $connection->query($sql);                            
foreach($statement as $row ){
    $status=$row['status'];
    $kode_ruangan=$row['kode_ruangan'];
    $nama_ruangan=$row['nama_ruangan'];
    $lantai=$row['lantai'];
    if($status==1){
        echo"
        <tr>
            <td>$nomor</td>
            <td>$kode_ruangan</td>
            <td>$nama_ruangan</td>
            <td>$lantai</td>
            <td>Tersedia</td>
            
        </tr>
        ";
    $nomor +=1;

    }
}
?>