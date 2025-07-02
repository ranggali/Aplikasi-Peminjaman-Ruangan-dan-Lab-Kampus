<?php
require_once __DIR__ . '../../koneksi.php';
$connection = getConnection();
$sql = <<< SQL
        SELECT * FROM ruangan 
    SQL;
$statement = $connection->query($sql);

$nomor = 1;
foreach ($statement as $row) {
    $status = $row['status'];
    $kode_ruangan = $row['id_ruangan'];
    $nama_ruangan = $row['nama_ruangan'];
    $lantai = $row['lantai'];
    $id_ruangan = $row['id_ruangan'];
    if ($status == 0) {
        echo "
            <tr>
                <td>$nomor</td>
                <td>$kode_ruangan</td>
                <td>$nama_ruangan</td>
                <td>$lantai</td>
                <td>Ditempati</td>
                <td>
                    <a href='hapus_ruang.php?id=$id_ruangan' ><i class='bg-danger p-2 text-white rounded'>Hapus</i></a>
					<a href='edit-ruang.php?id=$id_ruangan' ><i class='bg-danger p-2 text-white rounded'>Edit</i></a>
                </td>
            </tr>
            ";
    } elseif ($status == 1) {
        echo "
            <tr>
                <td>$nomor</td>
                <td>$kode_ruangan</td>
                <td>$nama_ruangan</td>
                <td>$lantai</td>
                <td>Tersedia</td>
                <td>
                    <a href='hapus_ruang.php?id=$id_ruangan' onclick='hapus($id_ruangan)' ><i class='bg-danger p-2 text-white rounded'>Hapus</i></a>
					<a href='edit-ruang.php?id=$id_ruangan' ><i class='bg-danger p-2 text-white rounded'>Edit</i></a>
                </td>
            </tr>
            ";
    }
    $nomor += 1;
}
?>

<script>
    function tersedia(id) {
        $.ajax({
            type: 'POST',
            url: 'tersedia.php?id=' + id,
            success: function() {
                $('.data_ruang').load('data_ruang.php');
            }
        });
    }

    function terpakai(id) {
        $.ajax({
            type: 'POST',
            url: 'tidak_tersedia.php?id=' + id,
            success: function() {
                $('.data_ruang').load('data_ruang.php');
            }
        });
    }

    function hapus(id) {
        $.ajax({
            type: 'POST',
            url: 'hapus_ruang.php?id=' + id,
            success: function() {
                $('.info_ruang').load('data_ruang.php');
            }
        });
    }

    function edit(id) {
        $.ajax({
            type: 'POST',
            url: 'edit-ruang.php?id=' + id
        });
    }
</script>