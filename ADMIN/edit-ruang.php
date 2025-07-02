<?php
require_once __DIR__ . '../../koneksi.php';
$connection = getConnection();

session_start();
if ($_SESSION['login'] != true) {
    header('Location:index.php');
    exit();
}

$nim_mhs = $_SESSION['username'];
$id = $_GET['id'];
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

                <li class="active">
                    <a href="infoRuang.php"><i class="material-icons text-white">aspect_ratio</i><span class="text-white">informasi Ruangan</span></a>
                </li>

                <li class="">
                    <a href="schedules.php"><i class="material-icons text-white">date_range</i><span class="text-white">Konfirmasi</span></a>
                </li>

                <li class="">
                    <a href="LoanDone.php"><i class="material-icons text-white">grid_on</i><span class="text-white">Schedules</span></a>
                </li>

                <li class="">
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
            <?php
            require_once __DIR__ . '../../koneksi.php';
            $connection = getConnection();
            $sql = <<< SQL
                    SELECT * FROM ruangan WHERE id_ruangan = '$id'
                SQL;
            $statement = $connection->query($sql);

            $nomor = 1;
            foreach ($statement as $row) {
                $id = $row['id_ruangan'];
            }
            ?>
            <div class="main-content">
                <h3>Edit Data Ruangan</h3>
                <form action="update_ruang.php" method="POST" role="form">
                    <!-- <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right">ID</label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="id" placeholder="Kode Ruangan" value="<?php echo $row['id_ruangan']; ?>" required=""></div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right">KODE RUANGAN</label>
                            <div class="col-sm-8"><input type="text" class="form-control"  placeholder="Kode Ruangan" value="<?php echo $row['id_ruangan']; ?>" disabled></div>
                            <div class="col-sm-8"><input type="hidden" class="form-control" name="kode_ruangan" placeholder="Kode Ruangan" value="<?php echo $row['id_ruangan']; ?>"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right">NAMA RUANGAN</label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="nama_ruangan" placeholder="Nama Ruangan" value="<?php echo $row['nama_ruangan']; ?>" required=""></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right">LANTAI </label>
                            <div class="col-sm-8"><input type="text" class="form-control" name="lantai" placeholder="Lantai " id="alamat" value="<?php echo $row['lantai']; ?>" required="">
                            </div>
                        </div>
                    </div>
                    <a href="infoRuang.php" class="btn btn-danger plus float-right">Kembali</a>
                    <input type="submit" name="submit" class="btn btn-primary plus float-right" value="Simpan">
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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


    <script type="text/javascript">
        $('.info_ruang').load('data_ruang.php');

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