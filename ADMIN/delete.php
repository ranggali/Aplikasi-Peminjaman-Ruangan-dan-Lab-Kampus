<!-- //delete.php -->
<?php
    include_once('../koneksi.php');
 
    $output = array('error' => false);
 
    $db = getConnection();
    try{
        $sql = "DELETE FROM user WHERE nama_lengkap = '".$_POST['nama_lengkap']."'";
        //if-else statement executing query
        if($db->exec($sql)){
            $output['message'] = 'Member deleted successfully';
        }
        else{
            $output['error'] = true;
            $output['message'] = 'Something went wrong. Cannot delete member';
        } 
    }
    catch(PDOException $e){
        $output['error'] = true;
        $output['message'] = $e->getMessage();;
    }
 
    //close connection
    $db->close();
 
    echo json_encode($output);
?>