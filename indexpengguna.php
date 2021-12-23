<?php

session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>alert('Anda harus masuk!')</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "posyandu");
function query($query)
{
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

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

            <h1 class="logo me-auto"><a href="index.html">POSYLINE</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#info">Informasi</a></li>
                    <li><a class="nav-link scrollto" href="#footer">Tentang</a></li>
                    <li><a class="text-uppercase"><?php echo $_SESSION['user']['username_pengguna']; ?></a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="isi.php?halaman=logout" class="appointment-btn scrollto"><span class="d-none d-md-inline">
                    Keluar
            </a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h2 class="text-uppercase">Hallo <?php echo $_SESSION['user']['username_pengguna']; ?></h2>
            <h1>Selamat Datang di Posyline</h1>
            <h2>Membantu anda dalam memonitor tumbuh kembang si buah hati</h2>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Mengapa Memilih Posyline?</h3>
                            <p>
                                Karena dapat menggantikan peran buku yang sering kali mengalami kerusakan
                                ataupun hilang serta pencacatan data Posyandu akan lebih valid karna pencacatan
                                berlangsung secara digital dan menghindari kesalahan dalam mengartikan
                                tulisan yang dilakukan manual.
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <a href="isi.php">
                                            <i class="bx bx-calendar-event"></i>
                                            <h4>Jadwal Posyandu</h4>
                                            <p>Ayo jangan ragu ke posyandu</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <a href="isi.php?halaman=timbangan">
                                            <i class="bx bx-receipt"></i>
                                            <h4>Data Timbangan</h4>
                                            <p>Cek data timbangan si balita untuk mengetahui tumbuh kembangnya</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <a href="isi.php?halaman=imunisasi">
                                            <i class="bx bx-file"></i>
                                            <h4>Data Imunisasi</h4>
                                            <p>Lindungi si balita dari penyakit dengan cara imunisasi sesuai jadwal yang
                                                ditentukan</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        <section id="info" class="about">
            <div class="container-fluid">

                <div class="row">
                    <div
                        class="col-xl-5 col-lg-6 vidio-box d-flex justify-content-center align-items-stretch position-relative">
                    </div>

                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>Berikut beberapa tips untuk kesehatan sang bayi</h3>

                        <div class="icon-box">
                            <div class="icon"><i class="fa fa-child"></i></div>
                            <h4 class="title"><a
                                    href="https://www.alodokter.com/jangan-sembarangan-begini-cara-tepat-membersihkan-botol-susu-bayi"
                                    target="_blank">Tips Membersihkan Botol Susu</a></h4>
                            <p class="description">Membersihkan botol susu bayi tidak boleh sembarangan, karena botol
                                susu akan menempel dengan mulut bayi dan menampung susu yang akan diminumnya.</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="fa fa-female"></i></div>
                            <h4 class="title"><a
                                    href="https://www.liputan6.com/health/read/3610087/7-tips-ibu-menyusui-hasilkan-asi-melimpah"
                                    target="_blank">Tips Ibu Menyusui Hasilkan ASI Melimpah</a></h4>
                            <p class="description">Ada banyak manfaat air susu ibu (ASI) bagi tumbuh kembang balita,
                                salah satu manfaat yang paling nyata yakni ASI membantu meningkatkan kekebalan dan daya
                                tahan tubuh si Kecil dari serangan penyakit.</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon"><i class="fa fa-balance-scale"></i></div>
                            <h4 class="title"><a
                                    href="https://www.alodokter.com/cara-mencegah-stunting-pada-anak-sejak-masa-kehamilan"
                                    target="_blank">Tips Mencegah Bayi Stunting</a></h4>
                            <p class="description">Stunting merupakan salah satu gangguan tumbuh kembang yang dapat
                                terjadi pada anak. Kondisi ini menyebabkan anak memiliki perawakan pendek.</p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="section-title">
                        <h2>Tentang</h2>

                    </div>

                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h3>Posyline</h3>
                            <p>
                                Universitas Trunojoyo Madura <br>
                                Jl. Telang, Kamal <br>
                                Bangkalan, Jawa Timur, 69162<br>
                                Indonesia <br><br>
                                <strong>Email:</strong> <br>
                                posyline1@gmail.com<br>


                            </p>
                        </div>

                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#info">Informasi</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">

                        </div>

                        <div class="col-lg-4 col-md-6 footer-newsletter">

                        </div>

                    </div>
                </div>
            </div>

            <div class="container d-md-flex py-4">

                <div class="me-md-auto text-center text-md-start">

                    <div class="social-links text-center text-md-right pt-3 pt-md-0">
                        <a href="https://twitter.com/galuhsptyn" target="_blank" class="twitter"><i
                                class="bx bxl-twitter"></i></a>
                        <a href="https://www.facebook.com/galuh.septiyani.1" target="_blank" class="facebook"><i
                                class="bx bxl-facebook"></i></a>
                        <a href="https://www.instagram.com/galuhgembull/" target="_blank" class="instagram"><i
                                class="bx bxl-instagram"></i></a>
                        <a href="https://github.com/gafisk" target="_blank" class="github"><i
                                class="bx bxl-github"></i></a>
                    </div>
                </div>
        </footer><!-- End Footer -->

        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

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