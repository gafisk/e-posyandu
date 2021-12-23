<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "posyandu");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Posyline - Masuk</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- favicon -->
    <link href="assets/img/favicon.png" rel="icon">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="assets/img/login.jpeg" width="100%" style="padding: 50px;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Posyline</h1>
                                        <h2 class="h6 text-blue-900 mb-4">Masuk sebagai Pengguna</h2>

                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Username" name="username_pengguna">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Password" name="password">
                                        </div>
                                        <br>
                                        <h3 class="h6 text-blue-900 mb-4 small">* Untuk pendaftaran akun pengguna
                                            Posyline silahkan hubungin pengurus Posyline</h3>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"
                                            name="masuk">Masuk</button>
                                        <br>
                                        <hr>

                                    </form>

                                    <?php
                                    if (isset($_POST["masuk"])) {

                                        $username_pengguna = $_POST["username_pengguna"];
                                        $password = $_POST["password"];

                                        $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username_pengguna = '$username_pengguna'");

                                        if (mysqli_num_rows($result) === 1) {

                                            $_SESSION['user'] = mysqli_fetch_assoc($result);
                                            if ($password == $_SESSION['user']["password_pengguna"]) {
                                                echo "<div class='alert alert-info'> Sukses </div>";
                                                echo "<script>
                                                    document.location.href = 'indexpengguna.php';
                                              </script>";
                                            } else {
                                                echo "<div class='alert alert-danger'> Username atau password salah </div>";
                                            }
                                        } else {
                                            echo "<div class='alert alert-danger'> Username atau password salah </div>";
                                        }
                                    }
                                    ?>



                                    <div class="text-center">
                                        <a class="small" href="pengurus/login.php">Masuk Sebagai Pengurus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>