<!-- schedules -->
<?php
    require_once __DIR__ .'../../koneksi.php';  
    $connection = getConnection();
    $sql = <<< SQL
        SELECT p.nama_lengkap,p.nim,d.status,d.ruang,d.tanggal,d.tujuan,d.mulai,d.selesai,d.id_peminjaman
        FROM user as p 
        JOIN peminjam as d ON (p.nim=d.nim)
    SQL;
    $statement = $connection->query($sql);
                            
    $nomor=1;
    foreach($statement as $row ){
        $nama_lengkap=$row['nama_lengkap'];
        $status=$row['status'];
        $nim=$row['nim'];
        $ruang=$row['ruang'];
        $tujuan=$row['tujuan'];
        $tanggal=$row['tanggal'];
        $mulai=$row['mulai'];
        $selesai=$row['selesai'];
        $id = $row['id_peminjaman'];
        if ($status==0){

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
                <a href='#' class='hapus' name='hapus' onclick='tolak($id)'><i class='bg-danger p-2 text-white rounded'>Tolak</i></a>
                <a href='#' class='hapus' name='hapus' onclick='konfirmasi($id)'><i class='bg-success p-2 text-white rounded'>Terima</i></a> 
                </td>
            </tr>

            
            ";

                          
    }
    $nomor +=1;
}
?>

<script>
    function konfirmasi(id){
        $.ajax({
            type:'POST',
            url:'konfirmasi.php?id='+id,
            success:function(){
                $('.data_peminjam').load('data_peminjam.php');
            }
        });
    }
    function tolak(id){
        $.ajax({
            type:'POST',
            url:'tolak.php?id='+id,
            success:function(){
                $('.data_peminjam').load('data_peminjam.php');
            }
        });
    }

</script>

