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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/ico" href="images/favicon.ico">
    <title>Data Suspek</title>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="KIMP">
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
    <!-- Bootstrap 5 Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

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
                                    <h2 class="title-1">Data Suspek</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-header bg-danger">
                                <strong class="card-title text-light">Daftar Penumpang Suspek</strong>
                            </div>
                            <div class="card-body">
                                <!-- DATA TABLE -->
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <a type="button" href="exp.php"
                                            class="btn btn-secondary bi bi-file-earmark-spreadsheet"> Export</a>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2 m-b-40">
                                    <table class="table table-bordered table-data1 table-responsive">
                                        <thead>
                                            <tr class="table-active">
                                                <th>No</th>
                                                <th>Nomor Penerbangan</th>
                                                <th>Nama Penumpang</th>
                                                <th>Nomor HP</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori Barang</th>
                                                <th>Jumlah</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        $q = "SELECT * FROM tb_suspek order by id_suspek DESC";
                                        $tampil = mysqli_query($conn, $q);
                                        while ($data = mysqli_fetch_array($tampil)) {
                                            $nama_penumpang = explode("-", $data['nama_penumpang']); // Split the names by hyphen
                                            $implode_nama = implode(" ", $nama_penumpang); // Implode the names with space
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['nomor_penerbangan'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $implode_nama ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['nomor'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['nama_barang'] ?>
                                                    </td>

                                                    <td>
                                                        <?= $data['kategori_barang'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['jumlah'] ?>
                                                        <?= $data['satuan'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $data['status'] ?>
                                                    </td>
                                                    <td>
                                                        <?= toDate_ID($data['tanggal_simpan']) ?>
                                                    </td>

                                                    <td>
                                                        <a href="edit-sus.php?id=<?php echo $data['id_suspek'] ?>"><button
                                                                class="btn btn-warning bi bi-pencil-square" name="bedit"
                                                                type="submit"></button></a>
                                                        <a href="hapus.php?idp=<?php echo $data['id_suspek'] ?>"
                                                            onclick="return confirm('Yakin ingin menghapus ?')"><button
                                                                class="btn btn-danger bi bi-trash" name="bedit"
                                                                type="submit"></button></a>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <footer
                            class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                        </footer>
                        <div class="col d-flex align-items-center">
                            <div class="copyright align-items-center">
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
    <?php
    function toDate_ID($tanggal)
    {
        $date = new DateTime($tanggal);
        $date_now = $date->format('d-m-Y');
        $hour_now = $date->format('H:i:s');
        $month = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $var = explode('-', $date_now);
        return $var[0] . ' ' . $month[(int) $var[1]] . ' ' . $var[2] . ' ' . $hour_now;
    }
    ?>

    <script>
        var today = new Date(); /* new date object */
        var month = [
            "",
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ];

        var date =
            today.getDate() +
            "  " +
            month[today.getMonth() + 1] +
            "  " +
            today.getFullYear();
        /* display current date */
        document.getElementById("currentDate").innerHTML = date;

        /* Auto refreshing clock time */
        function startTime() {
            var today = new Date(); /* new date object */
            /* getting minutes hours and seconds from date object */
            var hours = today.getHours();
            var minutes = today.getMinutes();
            var seconds = today.getSeconds();
            /* 12 hour time formate */
            var amPm = "AM";
            if (hours > 13) {
                amPm = "PM";
            }
            /* put zero before numbers < 10 */
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }

            var time = hours + " : " + minutes + " : " + seconds + "  " + amPm;
            /* display current time */
            document.getElementById("currentTime").innerHTML = time;

            /* Auto refreshing time every 1 second */
            setTimeout(function () {
                startTime();
            }, 1000);
        }
    </script>
</body>

</html>
<!-- end document-->