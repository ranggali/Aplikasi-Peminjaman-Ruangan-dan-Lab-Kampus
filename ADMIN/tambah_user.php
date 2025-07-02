<?php
require_once __DIR__ . '../../koneksi.php';
$connection = getConnection();

session_start();
if ($_SESSION['login'] != true) {
    header('Location:index.php');
    exit();
}

$nim_mhs = $_SESSION['username'];

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Home PBL KEL 4</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" />
    



    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>




    <div class="wrapper">


        <div class="body-overlay"></div>


        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header text-white">
                <h3><img src="assets/user 1.png" width="30" height="30" alt=""><span class="text-white">Admin</span></h3>
            </div>
            <ul class="list-unstyled components">
                <li class="">
                    <a href="dashboard.php" class="dashboard text-white"><i class="material-icons text-white">dashboard</i><span>Dashboard</span></a>
                </li>

                <li class="">
                    <a href="infoRuang.php"><i class="material-icons text-white">aspect_ratio</i><span class="text-white">informasi Ruangan</span></a>
                </li>

                <li class="">
                    <a href="schedules.php"><i class="material-icons text-white">date_range</i><span class="text-white">Konfirmasi</span></a>
                </li>

                <li class="">
                    <a href="LoanDone.php"><i class="material-icons text-white">grid_on</i><span class="text-white">Schedules</span></a>
                </li>

                <li class="active">
                    <a href="tambah_user.php"><i class="material-icons text-white">library_books</i><span class="text-white">Tambah User</span></a>
                </li>

                
                <br><br><br><br><br><br><br>
                <hr color="white">

                <li class="">
                    <a onclick='return confirm("Apakah Anda yakin ingin keluar dari system ini?")' href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket text-white"></i><span class="text-white">Logout</span></a>
                </li>

            </ul>

        </nav>


        <!-- Page Content  -->
        <div id="content">

            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>

                        <a class="navbar-brand" href="#"> Tambah User </a>

                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>

                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">

                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="#">
								<span class="material-icons">settings</span>
								</a> -->
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="main-content">
                <br><a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahmhs"><i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA MAHASISWA</a>
                    
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NAMA </th>
                            <th scope="col">ID User</th>
                            <th scoope="col">USERNAME</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">PRODI</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="data_user">
                        <?php
                        require_once __DIR__ . '../../koneksi.php';
                        $connection = getConnection();
                        $sql = <<< SQL
                            SELECT * FROM user
                        SQL;
                        $statement = $connection->query($sql);

                        $nomor = 1;
                        foreach ($statement as $row) {
                            $username = $row['username'];
                            $nama_lengkap = $row['nama_lengkap'];
                            $password = $row['password'];
                            $prodi = $row['prodi'];
                            $id = $row['id_user'];
                            $id_user = $row['id_user']; ?>

                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $nama_lengkap ?></td>
                                <td><?= $id_user ?></td>
                                <td><?= $username ?></td>
                                <td><?= $password ?></td>
                                <td><?= $prodi ?></td>
                                <td>
                                    <a href='hapus_user.php?id=<?= $id_user ?>'  onclick='return confirm("Apakah Anda yakin ingin untuk menghapus?")'><i class='bg-danger p-2 text-white rounded'>Hapus</i></a>
                                    <a href='edit-user.php?id=<?= $id_user ?>'><i class='bg-primary p-2 text-white rounded'>Edit</i></a>
                                </td>
                            </tr>
                         <?php   $nomor += 1;
                        }
                        ?>
                    </tbody>
                    <!-- Modal Tambah USER -->
                    <div class="example-modal">
                        <div id="tambahmhs" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal title">Tambah User Baru</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form action="simpan_user.php" method="post" role="form">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">NAMA</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan Nama" value="" required=""></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">ID User</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="id_user" placeholder="Masukkan NIM" value="" required=""></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">USERNAME</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="username" placeholder="Masukkan username" value="" required=""></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">PASSWORD</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="password" placeholder="Masukkan Password" id="alamat" value="" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">PRODI</label>
                                                    <div class="col-sm-8"><input type="text" name="prodi" class="form-control" placeholder="Prodi" required="">
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit USER -->
                    <div class="example-modal">
                        <div id="tombolUbah" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3>Edit User</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" role="form">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label for="nama_lengkap" class="col-sm-3 control-label text-right">NAMA</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama" value=""></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">NIM</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="nim" id="nim" placeholder="Masukkan NIM" value=""></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">PASSWORD</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="password" id="password" placeholder="Masukkan Password" id="alamat" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">PRODI</label>
                                                    <div class="col-sm-8"><input type="text" name="prodi" id="prodi" class="form-control" placeholder="Prodi">
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="ubah" class="btn btn-info">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Hapus USER  -->
                    <div class="example-modal">
                        <div id="hapususer" class="modal fade" role="dialog" style="display:none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Anda Yakin Menghapus Data</h5>
                                    </div>
                                    <div class="modal-body">
                                        <h5 align="center">Apakah anda yakin ingin menghapus NIM<strong><span class="grt"></span></strong> ?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                        <form action="delete.php" method="POST">
                                            <input href="#" type="submit" name="submit" class="btn btn-primary" value="$row['nama_lengkap']">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </table>
            </div>



            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <nav class="d-flex">
                                <ul class="m-0 p-0">
                                    <li>
                                        <a href="#"></a>
                                    </li>
                                    <li>
                                        <a href="#"></a>
                                    </li>
                                    <li>
                                        <a href="#"></a>
                                    </li>
                                    <li>
                                        <a href="#"></a>
                                    </li>
                                    <li>
                                        <a href="#"></a>
                                    </li>
                                    <li>
                                        <a href="#"></a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                        <div class="col-md-6">
                            <!-- <p class="copyright d-flex justify-content-end"> &copy 2021 Design by
                        <a href="#">Vishweb Design</a> BootStrap Admin Dashboard
                    </p> -->
                        </div>
                    </div>
                </div>
            </footer>

        </div>



    </div>
    </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>



    <script type="text/javascript">
        //$('.data_user').load('data_user.php');
        $('.table').DataTable();

        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $('.more-button,.body-overlay').on('click', function() {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });

        });
    </script>


</body>

</html>