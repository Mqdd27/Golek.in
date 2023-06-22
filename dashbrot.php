<?php
session_start();
include 'db.php';
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if ($_SESSION['login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

if (isset($_POST['bsimpan'])) {
    $input = $_POST['tcari'];
    $array = explode(' ', $input);

    $DataArray = array();

    foreach ($array as $item) {
        $DataArray[] = "'$item'";
    }
    //print_r($DataArray);
    $nomor = str_replace("'","",$DataArray[2]);
    $newURI='sms-coba.php?nomor='.$nomor;

    $sql = "INSERT INTO `tb_suspek`(`nomor_penerbangan`, `nama_penumpang`, `nomor`) VALUES ";
    $sql .= '(' . implode(',', $DataArray) . ')';
    $simpan = mysqli_query($conn, $sql);
    if ($simpan) {
        // echo "<script>
        //     alert('Simpan data sukses');
        //     document.location='sms-coba.php?nomor=$DataArray[2]';
        // </script>";
        header('Location:'.$newURI);
    } else {
        echo "<script>
              alert('Simpan data Gagal');
              document.location='dashbrot.php';
          </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link rel="icon" type="image/ico" href="images/favicon.ico">
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/ap.png" width="200" height="50px" alt="aplogo" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active has-sub">
                            <a class="js-arrow" href="dashbrot.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="sus.php">
                                <i class="fas fa-chart-bar"></i>Data Suspek</a>
                        </li>
                        <li>
                            <a href="penumpang.php">
                                <i class="fas fa-table"></i>Monitor Penumpang</a>
                        </li>
                        <li>
                            <a href="exp.php">
                                <i class="far fa-check-square"></i>Export</a>
                        </li>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/ap.png" alt="aplogo" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="dashbrot.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="sus.php">
                                <i class="fas fa-chart-bar"></i>Data Suspek</a>
                        </li>
                        <li>
                            <a href="penumpang.php">
                                <i class="fas fa-table"></i>Monitor Penumpang</a>
                        </li>
                        <li>
                            <a href="exp.php">
                                <i class="far fa-check-square"></i>Export</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p25">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="account-wrap ml-auto">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="images/profile.png" />
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="images/profile.png" alt="Profile" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">Admin</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="logout.php">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dashboard</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-header bg-success">
                                <strong class="card-title text-light">Form Scan Barcode</strong>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Scan Barcode Tag Bagasi</label>
                                        <input type="text" class="form-control" placeholder="Scan Here" name="tcari"
                                            value="<?php if (isset($_POST['bcari'])) {
                                                echo $_POST['bcari'];
                                            } ?>">
                                        <button class="btn btn-outline-success mt-2" name="bsimpan" type="submit"
                                            onclick="autohidealert()"><i class="fa fa-plus-circle"></i>&nbsp;
                                            Tambah</button>
                                        <button class="btn btn-outline-danger mt-2" name="breset" type="Batalkan"><i
                                                class="fa fa-refresh"></i>&nbsp; Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <footer
                            class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top position-fixed fixed-bottom">
                        </footer>
                        <div class="col d-flex align-items-center">
                            <div class="copyright fixed-bottom align-items-center">
                                <p class="text  align-items-center">Copyright © 2023 Telkom-PENS. All rights reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </footer>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>

</html>
<!-- end document-->