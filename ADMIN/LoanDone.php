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
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

                <li class="active">
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

                        <a class="navbar-brand" href="#"> Schedules </a>

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
                <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus-circle mr-2"></i>TAMBAH SCHEDULE</a>
                <table class="table table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Id User</th>
                            <th>Nama</th>
                            <th>Ruangan</th>
                            <th>Tanggal</th>
                            <th>Tujuan</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="data_hapus">
                        <?php
                        require_once __DIR__ . '../../koneksi.php';
                        $connection = getConnection();
                        $sql = <<< SQL
        SELECT p.nama_lengkap,p.id_user,d.status,d.id_ruangan,d.tanggal,d.tujuan,d.waktu_mulai,d.waktu_selesai,d.id_peminjaman
        FROM peminjaman as d
        JOIN user as p ON (p.id_user=d.id_user)
    SQL;
                        $statement = $connection->query($sql);

                        $nomor = 1;
                        foreach ($statement as $row) {
                            $nama_lengkap = $row['nama_lengkap'];
                            $status = $row['status'];
                            $nim = $row['id_user'];
                            $ruang = $row['id_ruangan'];
                            $tujuan = $row['tujuan'];
                            $tanggal = $row['tanggal'];
                            $mulai = $row['waktu_mulai'];
                            $selesai = $row['waktu_selesai'];
                            $id = $row['id_peminjaman'];
                            if ($status == 1) { ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $nim ?></td>
                                    <td><?= $nama_lengkap ?></td>
                                    <td><?= $ruang ?></td>
                                    <td><?= $tanggal ?></td>
                                    <td><?= $tujuan ?></td>
                                    <td><?= $mulai ?></td>
                                    <td><?= $selesai ?></td>
                                    <td>
                                        <button class='bg-warning text-white rounded' name='hapus' data-toggle="modal" data-target="#edit<?= $id ?>"><i>Edit</i></button>
                                        <a href='hapus_data.php?id=<?= $id ?>&ruang=<?= $ruang ?>' class='hapus' onclick='return confirm("Apakah Anda yakin untuk menghapus?")'><i class='bg-danger p-2 text-white rounded'>HAPUS</i></a>
                                    </td>
                                </tr>
                                <div class="example-modal">
                                    <div id="edit<?= $id ?>" class="modal fade" role="dialog" style="display:none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3>Edit Data</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update_peminjaman.php" method="post" role="form">
                                                        <!-- <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">ID</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="id" placeholder="Kode Ruangan" value="" required=""></div>
                                                </div>
                                            </div> -->
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-3 control-label text-right">Tanggal </label>
                                                                <div class="col-sm-8"><input type="date" class="form-control" name="tanggal" placeholder="Kode Ruangan" value="<?= $tanggal ?>" required=""></div>
                                                                <div class="col-sm-8"><input type="hidden" class="form-control" name="id_peminjaman" placeholder="Kode Ruangan" value="<?= $id ?>" required=""></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-3 control-label text-right">Tujuan</label>
                                                                <div class="col-sm-8"><input type="text" class="form-control" name="tujuan" placeholder="" value="<?= $tujuan ?>" required=""></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-3 control-label text-right">Waktu Mulai </label>
                                                                <div class="col-sm-8"><input type="time" class="form-control" name="waktu_mulai" placeholder=" " id="alamat" value="<?= $mulai ?>" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="col-sm-3 control-label text-right">Waktu Selesai </label>
                                                                <div class="col-sm-8"><input type="time" class="form-control" name="waktu_selesai" placeholder=" " id="alamat" value="<?= $selesai ?>" required="">
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
                        <?php }
                            $nomor += 1;
                        }
                        ?>

                    </tbody>
                </table>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
            <div class="example-modal">
                <div id="tambah" class="modal fade" role="dialog" style="display:none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Edit Data</h3>
                            </div>
                            <div class="modal-body">
                                <form action="tambah_peminjaman.php" method="post" role="form">
                                    <!-- <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">ID</label>
                                                    <div class="col-sm-8"><input type="text" class="form-control" name="id" placeholder="Kode Ruangan" value="" required=""></div>
                                                </div>
                                            </div> -->
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Nama </label>
                                            
                                            <div class="col-sm-8">
                                                <select class="form-control" name="id_user" id="" required>
                                                    <option value="">pilih user</option>
                                                    <?php
                                                    $sql = <<< SQL
                                                        SELECT * FROM user
                                                    SQL;
                                                    $statement = $connection->query($sql);

                                                    foreach ($statement as $row) { ?>
                                                        <option  value="<?= $row['id_user'] ?>"><?= $row['nama_lengkap'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Ruangan </label>
                                            
                                            <div class="col-sm-8">
                                                <select class="form-control" name="id_ruangan" id="" required>
                                                    <option value="">pilih ruangan</option>
                                                    <?php
                                                    $sql = <<< SQL
                                                        SELECT * FROM ruangan WHERE status='1'
                                                    SQL;
                                                    $statement = $connection->query($sql);

                                                    foreach ($statement as $row) { ?>
                                                        <option  value="<?= $row['id_ruangan'] ?>"><?= $row['id_ruangan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Tanggal </label>
                                            <div class="col-sm-8"><input type="date" class="form-control" name="tanggal" placeholder="Tanggal" value="" required=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Tujuan </label>
                                            <div class="col-sm-8"><input type="text" class="form-control" name="tujuan" placeholder="tujuan" value="" required=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Waktu mulai </label>
                                            <div class="col-sm-8"><input type="time" class="form-control" name="waktu_mulai" placeholder="" value="" required=""></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Waktu selesai </label>
                                            <div class="col-sm-8"><input type="time" class="form-control" name="waktu_selesai" placeholder="" value="" required=""></div>
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
        //$('.data_hapus').load('hapus_peminjaman.php');
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