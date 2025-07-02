<?php
require_once __DIR__ .'../../koneksi.php';  
$connection = getConnection();
session_start();
$nim_mhs = $_SESSION['username'];
$sql = <<<SQL
    SELECT p.nama_lengkap,p.nim,d.status,p.username,d.ruang,d.tanggal,d.tujuan,d.mulai,d.selesai,d.id_peminjaman
    FROM user as p 
    JOIN peminjam as d ON (p.nim=d.nim)
    WHERE p.nim = '$nim_mhs'
SQL;
$statement = $connection->query($sql);                            
$nomor=1;
foreach($statement as $row ){
    $nama_lengkap=$row['nama_lengkap'];
    $status=$row['status'];
    $nim=$row['nim'];
    $ruang=$row['ruang'];
    $tanggal=$row['tanggal'];
    $tujuan=$row['tujuan'];
    $mulai=$row['mulai'];
    $selesai=$row['selesai'];
    $id = $row['id_peminjaman'];
    if($status==0 && $nim == $nim_mhs){
        echo"
        <tr>
            <td>$nomor</td>
            <td>$nim</td>
            <td>$nama_lengkap</td>
            <td>$ruang</td>
            <td>$tanggal</td>
            <td>$tujuan</td>
            <td>$mulai</td>
            <td>$selesai</td>
            <td>
            <a href='#'onclick='selesai($id)' ><i class='bg-info p-2 text-white rounded'>Selesai</i></a>
            </td>
            
        </tr>
        ";
    $nomor +=1;

    }elseif($status==4 && $nim == $nim_mhs){
        echo"
        <tr>
            <td>$nomor</td>
            <td>$nim</td>
            <td>$nama_lengkap</td>
            <td>$ruang</td>
            <td>$tanggal</td>
            <td>$tujuan</td>
            <td>$mulai</td>
            <td>$selesai</td>
            <td>
            <a href='#'onclick='ditolak($id)' ><i class='bg-dangero p-2 text-white rounded'>Ditolak</i></a>
            </td>
            
        </tr>
        ";
    $nomor +=1;

    }
}

$sql = <<<SQL
    SELECT p.nama_lengkap,p.nim,d.status,d.ruang,d.tanggal,d.tujuan,d.mulai,d.selesai,d.id_peminjaman
    FROM user as p 
    JOIN peminjam as d ON (p.nim=d.nim)
SQL;
$statement = $connection->query($sql);                                
foreach($statement as $row ){
    $nama_lengkap=$row['nama_lengkap'];
    $status=$row['status'];
    $nim=$row['nim'];
    $ruang=$row['ruang'];
    $tanggal=$row['tanggal'];
    $tujuan=$row['tujuan'];
    $mulai=$row['mulai'];
    $selesai=$row['selesai'];
    if($status==1 ){
        echo"
        <tr>
            <td>$nomor</td>
            <td>$nim</td>
            <td>$nama_lengkap</td>
            <td>$ruang</td>
            <td>$tanggal</td>
            <td>$tujuan</td>
            <td>$mulai</td>
            <td>$selesai</td>
            <td>waiting</td>
        </tr>
        ";
    $nomor +=1;
    }
}  
$sql = <<<SQL
    SELECT p.nama_lengkap,p.nim,d.status,d.ruang,d.tanggal,d.tujuan,d.mulai,d.selesai,d.id_peminjaman
    FROM user as p 
    JOIN peminjam as d ON (p.nim=d.nim)
SQL;
$statement = $connection->query($sql);                                
foreach($statement as $row ){
    $nama_lengkap=$row['nama_lengkap'];
    $status=$row['status'];
    $nim=$row['nim'];
    $ruang=$row['ruang'];
    $tanggal=$row['tanggal'];
    $tujuan=$row['tujuan'];
    $mulai=$row['mulai'];
    $selesai=$row['selesai'];
    if($status==0 && $nim != $nim_mhs ){
        echo"
        <tr>
            <td>$nomor</td>
            <td>$nim</td>
            <td>$nama_lengkap</td>
            <td>$ruang</td>
            <td>$tanggal</td>
            <td>$tujuan</td>
            <td>$mulai</td>
            <td>$selesai</td>
            <td>Accepted</td>
        </tr>
        ";
    $nomor +=1;

    }
}                            
?>
<script>
    function selesai(id){
        $.ajax({
            type:'POST',
            url:'konfirmasi.php?id='+id,
            success:function(){
                $('.data_peminjaman').load('info_peminjam.php');
            }
        });
    }
    function ditolak(id){
        $.ajax({
            type:'POST',
            url:'ditolak.php?id='+id,
            success:function(){
                $('.data_peminjaman').load('info_peminjam.php');
            }
        });
    }

</script>


                        