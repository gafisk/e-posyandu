<?php

// session_start();

// if (!isset($_SESSION['user'])) {
//     echo "<script>alert('Anda harus masuk!')</script>";
//     echo "<script>location='../login.php';</script>";
//     exit();
// }

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

function tambah($data)
{
    global $conn;

    $tanggal = ($data["tanggal"]);
    $waktu = ($data["waktu"]);
    $nama_kegiatan = htmlspecialchars($data["nama_kegiatan"]);

    $query = "INSERT INTO jadwal
                VALUES
            ('', '$tanggal', '$waktu','$nama_kegiatan')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tdk ada gambar yg diupload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>
        ";
        return false;
    }

    // apa yg diupload user hanya gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>
        ";
        return false;
    }

    // nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // lolos pengecekan
    move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);

    return $namaFileBaru;
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $tanggal = htmlspecialchars($data["tanggal"]);
    $waktu = htmlspecialchars($data["waktu"]);
    $nama_kegiatan = htmlspecialchars($data["nama_kegiatan"]);

    $query = "UPDATE jadwal SET
                tanggal = '$tanggal',
                waktu = '$waktu',
                nama_kegiatan = '$nama_kegiatan' 

            WHERE id_jadwal = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM jadwal WHERE id_jadwal = $id");

    return mysqli_affected_rows($conn);
}

function tambahbalita($data)
{
    global $conn;

    $nik_balita = htmlspecialchars($data["nik_balita"]);
    $nama_balita = htmlspecialchars($data["nama_balita"]);
    $jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $nama_ayah = htmlspecialchars($data["nama_ayah"]);
    $nama_ibu = htmlspecialchars($data["nama_ibu"]);
    $anak_ke = htmlspecialchars($data["anak_ke"]);
    $berat_lahir = htmlspecialchars($data["berat_lahir"]);
    $panjang_lahir = htmlspecialchars($data["panjang_lahir"]);
    $IMD = htmlspecialchars($_POST["IMD"]);
    $buku_KIA = htmlspecialchars($_POST["buku_KIA"]);

    $query = "INSERT INTO data_balita
                VALUES
            ('$nik_balita', '$nama_balita', '$jenis_kelamin','$tanggal_lahir', '$nama_ayah', '$nama_ibu', '$anak_ke', '$berat_lahir', '$panjang_lahir', '$IMD', '$buku_KIA')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahbalita($data)
{
    global $conn;

    $id = $_GET["id"];
    $nik_balita = htmlspecialchars($data["nik_balita"]);
    $nama_balita = htmlspecialchars($data["nama_balita"]);
    $jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);
    $tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
    $nama_ayah = htmlspecialchars($data["nama_ayah"]);
    $nama_ibu = htmlspecialchars($data["nama_ibu"]);
    $anak_ke = htmlspecialchars($data["anak_ke"]);
    $berat_lahir = htmlspecialchars($data["berat_lahir"]);
    $panjang_lahir = htmlspecialchars($data["panjang_lahir"]);
    $IMD = htmlspecialchars($_POST["IMD"]);
    $buku_KIA = htmlspecialchars($_POST["buku_KIA"]);

    $query = "UPDATE data_balita SET
                nik_balita = '$nik_balita',
                nama_balita = '$nama_balita',
                jenis_kelamin = '$jenis_kelamin',
                tanggal_lahir = '$tanggal_lahir',
                nama_ayah = '$nama_ayah',
                nama_ibu = '$nama_ibu',
                anak_ke = '$anak_ke',
                berat_lahir = '$berat_lahir',
                panjang_lahir = '$panjang_lahir',
                IMD = '$IMD',
                buku_KIA = '$buku_KIA'

            WHERE nik_balita = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusbalita($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data_balita WHERE nik_balita = $id");

    return mysqli_affected_rows($conn);
}

function tambahtimbangan($data)
{
    global $conn;

    $nik_balita = $_GET['id'];
    $id_bulan_timbangan = htmlspecialchars($data["bulan_timbangan"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $berat_badan = htmlspecialchars($data["berat_badan"]);
    $tinggi_badan = htmlspecialchars($data["tinggi_badan"]);

    $query = "INSERT INTO data_timbangan
                VALUES
            ('', '$nik_balita', '$id_bulan_timbangan','$tahun','$berat_badan','$tinggi_badan')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapustimbangan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data_timbangan WHERE id_data_timbangan = $id");

    return mysqli_affected_rows($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Posyandu - Pengurus</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-3">POSYLINE</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <li class="nav-item active">
                <a class="nav-link" href="index.php?halaman=home">
                    <i class="fas fa-home"></i>
                    <span></span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="index.php?halaman=jadwal">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Jadwal Posyandu</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="index.php?halaman=data">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Data Balita</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="index.php?halaman=timbangan">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Data timbangan</span></a>
            </li>

            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Pengurus</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div id="page-wrapper">
                        <div id="page-inner">
                            <?php
                            if (isset($_GET['halaman'])) {
                                if ($_GET['halaman'] == "jadwal") {
                                    include 'jadwal.php';
                                } elseif ($_GET['halaman'] == "data") {
                                    include 'data.php';
                                } elseif ($_GET['halaman'] == "home") {
                                    include 'home.php';
                                } elseif ($_GET['halaman'] == "tambah") {
                                    include 'tambah.php';
                                } elseif ($_GET['halaman'] == "ubahjadwal") {
                                    include 'ubahjadwal.php';
                                } elseif ($_GET['halaman'] == "hapusjadwal") {
                                    include 'hapusjadwal.php';
                                } elseif ($_GET['halaman'] == "tambahbalita") {
                                    include 'tambahbalita.php';
                                } elseif ($_GET['halaman'] == "ubahbalita") {
                                    include 'ubahbalita.php';
                                } elseif ($_GET['halaman'] == "hapusbalita") {
                                    include 'hapusbalita.php';
                                } elseif ($_GET['halaman'] == "timbangan") {
                                    include 'datatimbangan.php';
                                } elseif ($_GET['halaman'] == "tambahtimbangan") {
                                    include 'tambahtimbangan.php';
                                } elseif ($_GET['halaman'] == "detailtimbangan") {
                                    include 'detailtimbangan.php';
                                } elseif ($_GET['halaman'] == "ubahtimbangan") {
                                    include 'ubahtimbangan.php';
                                } elseif ($_GET['halaman'] == "hapustimbangan") {
                                    include 'hapustimbangan.php';
                                }
                            } else {
                                include 'home.php';
                            }
                            ?>
                        </div>
                        <!-- /. PAGE INNER  -->
                    </div>
                </div>

                <!-- Footer -->

                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>