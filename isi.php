<?php 

session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>alert('Anda harus masuk!')</script>";
    echo "<script>location='../login.php';</script>";
    exit();
}

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "posyandu");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Posyandu Online</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.3.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style type="text/css">
    #hero {
  width: 100%;
  height: 80vh;
  background: url("assets/img/bayi-bg.jpeg") top center;
  background-size: cover;
  margin-bottom: -200px;
  }

  .about .vidio-box {
  background: url("assets/img/info.jpeg") center center no-repeat;
  background-size: cover;
  min-height: 500px;
  }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto" style="color: #1977cc;"><a href="index.html">POSYLINE</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul class="main-menu">
          <li><a class="nav-link scrollto" href="indexpengguna.php">Home</a></li>
          <li><a class="nav-link scrollto" href="isi.php">Jadwal Posyandu</a></li>
          <li><a class="nav-link scrollto" href="isi.php?halaman=timbangan">Data Timbangan</a></li>
          <li><a class="nav-link scrollto" href="isi.php?halaman=imunisasi">Data Imunisasi</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a class="appointment-btn scrollto"><span class="d-none d-md-inline"><?php echo $_SESSION['user']['username_pengguna']; ?></a>

    </div>
  </header><!-- End Header -->
  <section id="info" class="about">
      <div class="container-fluid">

        <div class="row">
         

          <div class="align-items-stretch justify-content-center py-5 px-lg-5">
            <br>
            <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="timbangan") {
                        include 'timbangan.php';

                    } elseif ($_GET['halaman']=="imunisasi") {
                        include 'imunisasi.php';

                    } elseif ($_GET['halaman']=="logout") {
                        include 'logout.php';

                    } 
                } 
                else {
                    include 'jadwal.php';
                }
                ?>

            
            

          </div>
        </div>

      </div>
    </section>
 
  

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>