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
  SELECT * FROM user WHERE id_user = '$nim_mhs'
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
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
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
                    <h3><img src="assets/user 1.png" width="30" height="30" alt=""><span class="text-white"><?php echo"$nama_lengkap";?></span></h3>
                </div>
                <ul class="list-unstyled components">
                <li  class="active">
                        <a href="dashboard.php" class="dashboard text-white"><i class="material-icons text-white">dashboard</i><span>Dashboard</span></a>
                </li>

                <li class="">
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
					
					<a class="navbar-brand" href="#"> Dashboard </a>
					
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
			
                <div class="col-md-12">
                    <h2 class="text-center">SELAMAT DATANG !</h2><hr>

                    <!--Source was written by suma411.blogspot.com-->

                    <!-- <script language="JavaScript" type="text/javascript">

                        var message = " Selamat Datang di Website Peminjaman Ruangan  ";
                        var count = 0;
                        var i = 0;
                        var gap = message.length;
                    
                        while (i < gap) { i++; message = " " + message; }
                    
                    function statScroll() {
                        document.scroll.msg.value = message.substring(count, message.length);
                        count++;
                        if (message.length == count) { count = 0; }
                        window.setTimeout("statScroll()", 120);
                        }
                    window.onload = statScroll;
                    
                    //-->
                    <!-- </script> 
                    
                    <center>
                    
                    <form name="scroll">
                        <input type="text" name="msg" value=" " size="10" style=color:black;font-family:Ubuntu;font-weight:bold;font-size:55px;>
                    </form>
                    
                    </center> -->
                    
                    <!--Source was written by suma411.blogspot.com-->
                </div>
               
                <!-- <div class="row"><hr class="bg-secondary"> -->
			
			<div class="row">
                <main class="grid">
                    <article>
                        <img src="assets/uu.jpeg" width="300px" height="300px">
                        <div class="konten">
                            <h2> RUANG KELAS 11.5</h2>
                            <button type="button" class="btn btn-info" data-target="#ruang1" data-toggle="modal">Detail</button>
                            <!-- <a href="#" class="btn btn-secondary" data-target="#produk1" data-toggle="modal">Available</a> -->
                        </div>
                    </article>
                    <article>
                        <img src="assets/uu.jpeg" width="300px" height="300px">
                        <div class="konten">
                            <h2>RUANG KELAS 11.3</h2>
                            <button type="button" class="btn btn-info" data-target="#ruang2" data-toggle="modal">Detail</button>
                        </div>
                    </article>
                    <article>
                        <img src="assets/uu.jpeg" width="300px" height="300px">
                        <div class="konten">
                            <h2>RUANG KELAS 11.4</h2>
                            <button type="button" class="btn btn-info" data-target="#ruang3" data-toggle="modal">Detail</button>
                    </article>
                    <article>
                        <img src="assets/uu.jpeg" width="300px" height="300px">
                        <div class="konten">
                            <h2> RUANG KELAS 11.5</h2>
                            <button type="button" class="btn btn-info" data-target="#ruang4" data-toggle="modal">Detail</button>
                        </div>
                    </article>
                    <article>
                        <img src="assets/uu.jpeg" width="300px" height="300px">
                        <div class="konten">
                            <h2>RUANG KELAS 11.3</h2>
                            <button type="button" class="btn btn-info" data-target="#ruang5" data-toggle="modal">Detail</button>
                        </div>
                    </article>
                    <article>
                        <img src="assets/uu.jpeg" width="300px" height="300px">
                        <div class="konten">
                            <h2>RUANG KELAS 11.4</h2>
                            <button type="button" class="btn btn-info" data-target="#ruang6" data-toggle="modal">Detail</button>
                    </article>
        
                    <!-- MODAL -->
        
                    <div class="modal fade" id="ruang1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Ruangan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <img class="d-block w-100" src="img/slider/pg1.jpeg" alt="First slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="img/slider/pg2.jpeg" alt="Second slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="img/slider/pg3.jpeg" alt="Third slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="img/slider/pg4.jpeg" alt="Third slide">
                                  </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
        
                      <div class="modal fade" id="ruang2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Ruangan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <img class="d-block w-100" src="img/slider/pg1.jpeg" alt="First slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="img/slider/pg2.jpeg" alt="Second slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="img/slider/pg3.jpeg" alt="Third slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="img/slider/pg4.jpeg" alt="Third slide">
                                  </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
        
                      <div class="modal fade" id="ruang3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Ruangan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active">
                                    <img class="d-block w-100" src="img/slider/pg1.jpeg" alt="First slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="img/slider/pg2.jpeg" alt="Second slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="img/slider/pg3.jpeg" alt="Third slide">
                                  </div>
                                  <div class="carousel-item">
                                    <img class="d-block w-100" src="img/slider/pg4.jpeg" alt="Third slide">
                                  </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
        
                      <div class="modal fade" id="ruang4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Ruangan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
        
                      <div class="modal fade" id="ruang5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Ruangan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="modal fade" id="ruang6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Ruangan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
  
  
  <script type="text/javascript">
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
				$('#content').toggleClass('active');
            });
			
			 $('.more-button,.body-overlay').on('click', function () {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });
			
        });

</script>

<!-- <script language="JavaScript" type="text/javascript">

    var message = " Selamat Datang di Website Peminjaman Ruangan  ";
    var count = 2;
    var i = 0;
    var gap = message.length;

    while (i < gap) { i++; message = " " + message; }

    function statScroll() {
    document.scroll.msg.value = message.substring(count, message.length);
    count++;
    if (message.length == count) { count = 2; }
    window.setTimeout("statScroll()", 120);
    }
window.onload = statScroll;
</script>  
   -->



</body>
</html>


