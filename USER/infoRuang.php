<?php
require_once __DIR__ .'../../koneksi.php';
$connection = getConnection();

session_start();
if($_SESSION['login'] != true){
  header('Location:index.php');
  exit();
}

$nim_mhs = $_SESSION['id'];

$sql = <<< SQL
  SELECT * FROM user WHERE id_user = '$nim_mhs';
SQL;
$statement = $connection->query($sql);
$connection = null;
foreach($statement as $row){
  $nama_lengkap = $row['nama_lengkap'];
}

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
                    <h3><img src="assets/user 1.png" width="30" height="30" alt=""><span class="text-white"><?php echo"$nama_lengkap";?></span></h3>
                </div>
                <ul class="list-unstyled components">
                <li  class="">
                        <a href="dashboard.php" class="dashboard text-white"><i class="material-icons text-white">dashboard</i><span>Dashboard</span></a>
                </li>

                <li class="active">
                    <a href="infoRuang.php"><i class="material-icons text-white">aspect_ratio</i><span class="text-white">informasi Ruangan</span></a>
                </li>
                
                <li class="">
                    <a href="formLoan.php"><i class="material-icons text-white">library_books</i><span class="text-white">Form Peminjaman</span></a>
                </li>
                <li class="">
                            <a href="schedules.php"><i class="material-icons text-white">date_range</i><span class="text-white">Konfirmasi</span></a>
                        </li>

                <li class="">
                    <a href="LoanDone.php"><i class="material-icons text-white">grid_on</i><span class="text-white">Schedules</span></a>
                </li>
				
				        <li  class="">
                    <a href="Team.php"><i class="material-icons text-white">people</i><span class="text-white">Contact Us</span></a>
                </li>
                <br><br><br><br><br><br><br><hr color="white">

                <li  class="">
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

                        <a class="navbar-brand" href="#"> Informasi Ruangan </a>

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
                <table class="table table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id Ruangan</th>
                            <th>Nama Ruangan</th>
                            <th>Lantai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="info_ruang">
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
            </tr>
            ";
                            }
                            $nomor += 1;
                        }
                        ?>
                    </tbody>
                </table>
                <div class="example-modal">
                    <div id="tambahruang" class="modal fade" role="dialog" style="display:none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Tambah Ruangan Baru</h3>
                                </div>
                                <div class="modal-body">
                                    <form action="tambah_ruang.php" method="post" role="form">
                                        <!-- <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">ID</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="id" placeholder="Kode Ruangan" value="" required=""></div>
                                                </div>
                                            </div> -->
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">ID RUANGAN</label>
                                                <div class="col-sm-8"><input type="text" class="form-control" name="kode_ruangan" placeholder="id Ruangan" value="" required=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">NAMA RUANGAN</label>
                                                <div class="col-sm-8"><input type="text" class="form-control" name="nama_ruangan" placeholder="Nama Ruangan" value="" required=""></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">LANTAI </label>
                                                <div class="col-sm-8"><input type="text" class="form-control" name="lantai" placeholder="Lantai " id="alamat" value="" required="">
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
        $('.info_ruang').load('data_ruang.php');
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

        function tersedia(id_ruangan) {
            $.ajax({
                type: 'POST',
                url: 'tersedia.php?id=' + id,
            });
        }
    </script>





</body>

</html>