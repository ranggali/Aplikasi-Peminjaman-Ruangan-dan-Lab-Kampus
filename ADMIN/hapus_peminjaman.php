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
        $tanggal=$row['tanggal'];
        $tujuan=$row['tujuan'];
        $mulai=$row['mulai'];
        $selesai=$row['selesai'];
        $id = $row['id_peminjaman'];
        if ($status==2){

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
                    <a href='#' onclick='hapus($id)' ><i class='bg-danger p-2 text-white rounded'>Hapus</i></a>

                </td>
            </tr>

            
            ";
        $nomor +=1;
                          
    }
}
?>
<script>
function hapus(id){
        $.ajax({
            type:'POST',
            url:'hapus_data.php?id='+id,
            success:function(){
                $('.data_hapus').load('hapus_peminjaman.php');
            }
        });
    }

</script>