<?php
session_start();
require_once __DIR__ .'/koneksi.php';
$connection = getConnection();


$username = $_POST['username'];
$password  = $_POST['password'];


// login sebagai Mahasiswa
$login_mhs = "SELECT * FROM user WHERE username = :username AND password = :password";

$cek_mhs = $connection->prepare($login_mhs);
$cek_mhs->bindParam("username",$username);
$cek_mhs->bindParam("password",$password);
$cek_mhs->execute();

// login sebagai Admin
$login_admin = "SELECT * FROM admin WHERE username = :username AND password = :password";

$cek_admin = $connection->prepare($login_admin);
$cek_admin->bindParam("username",$username);
$cek_admin->bindParam("password",$password);
$cek_admin->execute();

//cek mahasiswa
$success_mhs = false;
$password_mhs = null;
$username_mhs = null;
foreach($cek_mhs as $row){
    $success_mhs = true;
    $id_mhs = $row['id_user'];
    $username_mhs = $row['username'];
    $password_mhs = $row['password'];
}

//cek admin
$success_admin = false;
$password_admin = null;
$username_admin = null;
foreach($cek_admin as $row){
    $success_admin = true;
    $id_admin = $row['id_admin'];
    $username_admin = $row['username'];
    $password_admin = $row['password'];
}



if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($success_mhs){ 
        // if($_SESSION['login'] == true ){
        //     header("location:lamandashboard.php");
        //     exit();
        // }  
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username_mhs;
        $_SESSION['id'] = $id_mhs;
        header("location:USER/dashboard.php");
        exit();
          
    }elseif($success_admin){
        // if($_SESSION['login'] == true && $success_admin){
        //     header("location:lamandashboardadmin.php");
        //     exit();
        // }
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username_admin;
        $_SESSION['id'] = $id_admin;
        header("location:ADMIN/dashboard.php");
        exit();
    }else{
        header("location:index.php");
        exit();
    }    
}else{
    header("location:index.php");
    exit();
}

$connection = null
?>
