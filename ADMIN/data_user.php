<?php
    require_once __DIR__ .'../../koneksi.php';  
    $connection = getConnection();
    $sql = <<< SQL
        SELECT * FROM user ORDER BY entry_date ASC
    SQL;
    $statement = $connection->query($sql);
                            
    $nomor=1;
    foreach($statement as $row ){
        $username=$row['username'];
        $nama_lengkap=$row['nama_lengkap'];
        $nim=$row['nim'];
        $password=$row['password'];
        $prodi=$row['prodi'];
        $id=$row['id_user'];
		$id_user=$row['nim'];
  
        echo"
            <tr>
                <td>$nomor</td>
                <td>$nama_lengkap</td>
                <td>$nim</td>
                <td>$username</td>
                <td>$password</td>
                <td>$prodi</td>
				<td>
                    <a href='hapus_user.php?id=$id_user' ><i class='bg-danger p-2 text-white rounded'>Hapus</i></a>
					<a href='edit-user.php?id=$id_user' ><i class='bg-primary p-2 text-white rounded'>Edit</i></a>
                </td>
            </tr>

            ";
        $nomor +=1;
                          
    
}
?>
<script>
    function hapus(id){
        $.ajax({
            type:'POST',
            url:'hapus_user.php?id='+id,
            success:function(){
                $('.data_user').load('data_user.php');
            }
        });
    }
    function edit(id){
        $.ajax({
            type:'POST',
            url:'ubah.php?id='+id,
            success:function(){
                $('.data_user').load('data_user.php');
            }
        });
    }
</script>