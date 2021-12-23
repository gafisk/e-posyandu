<?php

session_start();

if (!isset($_SESSION['admin'])) {
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

function tambahpengurus($data)
{
    global $conn;

    $nama = $data['nama'];
    $nik = $data['nik'];
    $username = $data['username'];
    $password = $data['password'];

    $query = "INSERT INTO pengurus
                VALUES
            (NULL, '$nama', '$nik', '$username','$password')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahpengurus($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data['nama'];
    $nik = $data['nik'];
    $username = $data['username'];
    $password = $data['password'];

    $query = "UPDATE pengurus SET
                id_posyandu = '$nama',
                nik_pengurus = '$nik',
                username_pengurus = '$username',
                password_pengurus = '$password' 

            WHERE id_pengurus = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapuspengurus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pengurus WHERE id_pengurus = $id");

    return mysqli_affected_rows($conn);
}

function tambahposyandu($data)
{
    global $conn;

    $nama = $data['nama'];
    $rt = $data['rt'];
    $rw = $data['rw'];
    $desa = $data['desa'];
    $kecamatan = $data['kecamatan'];
    $kabupaten = $data['kabupaten'];
    $provinsi = $data['provinsi'];

    $query = "INSERT INTO data_posyandu
                VALUES
            (NULL, '$nama', '$rt', '$rw', '$desa', '$kecamatan', '$kabupaten', '$provinsi')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahposyandu($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data['nama'];
    $rt = $data['rt'];
    $rw = $data['rw'];
    $desa = $data['desa'];
    $kecamatan = $data['kecamatan'];
    $kabupaten = $data['kabupaten'];
    $provinsi = $data['provinsi'];

    $query = "UPDATE data_posyandu SET
                nama_posyandu = '$nama',
                rt = '$rt',
                rw = '$rw',
                desa = '$desa',
                kecamatan = '$kecamatan',
                kabupaten = '$kabupaten',
                provinsi = '$provinsi' 

            WHERE id_posyandu = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusposyandu($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data_posyandu WHERE id_posyandu = $id");

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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link href="../assets/img/favicon.png" rel="icon">
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
                    <span>Home</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="index.php?halaman=posyandu">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Posyandu</span></a>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="index.php?halaman=pengurus">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Pengurus</span></a>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="index.php?halaman=pengguna">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Pengguna</span></a>
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



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


                                <span class="mr-2 d-none d-lg-inline text-gray-600">

                                    <?php echo $_SESSION['admin']['username_admin']; ?>

                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal"
                                    data-target="#logoutModal">
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
                                if ($_GET['halaman'] == "home") {
                                    include 'home.php';
                                } elseif ($_GET['halaman'] == "pengguna") {
                                    include 'pengguna.php';
                                } elseif ($_GET['halaman'] == "pengurus") {
                                    include 'pengurus.php';
                                } elseif ($_GET['halaman'] == "tambahpengurus") {
                                    include 'tambahpengurus.php';
                                } elseif ($_GET['halaman'] == "ubahpengurus") {
                                    include 'ubahpengurus.php';
                                } elseif ($_GET['halaman'] == "hapuspengurus") {
                                    include 'hapuspengurus.php';
                                } elseif ($_GET['halaman'] == "posyandu") {
                                    include 'posyandu.php';
                                } elseif ($_GET['halaman'] == "tambahposyandu") {
                                    include 'tambahposyandu.php';
                                } elseif ($_GET['halaman'] == "ubahposyandu") {
                                    include 'ubahposyandu.php';
                                } elseif ($_GET['halaman'] == "hapusposyandu") {
                                    include 'hapusposyandu.php';
                                } elseif ($_GET['halaman'] == "logout") {
                                    include 'logout.php';
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Jika anda keluar maka anda akan menuju ke halaman login.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-primary" href="index.php?halaman=logout">Keluar</a>
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