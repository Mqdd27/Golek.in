<?php
session_start();
include "db.php";
if ($_SESSION["login"] != true) {
    echo '<script>window.location="login.php"</script>';
}
// Menanpilkan data dari tabel tb_suspek
$barang = mysqli_query(
    $conn,
    "SELECT * FROM tb_suspek WHERE id_suspek = '" . $_GET["id"] . "' "
);
if (mysqli_num_rows($barang) == 0) {
    echo '<script>window.location="dash.php"</script>';
}
$b = mysqli_fetch_assoc($barang);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/ico" href="images/favicon.ico">
<title>Edit Data Suspek</title>
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
<!-- Bootstrap 5 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

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
                        <li>
                            <a class="js-arrow" href="dashbrot.php" style="text-decoration:none" >
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="sus.php" style="text-decoration:none" >
                                <i class="fas fa-chart-bar"></i>Data Suspek</a>
                        </li>
                        <li>
                            <a href="penumpang.php" style="text-decoration:none" >
                                <i class="fas fa-table"></i>Monitor Penumpang</a>
                        </li>
                        <li>
                            <a href="exp.php" style="text-decoration:none" >
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
                        <li>
                            <a class="js-arrow" href="dashbrot.php" style="text-decoration:none" >
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="sus.php" style="text-decoration:none" >
                                <i class="fas fa-chart-bar"></i>Data Suspek</a>
                        </li>
                        <li>
                            <a href="penumpang.php" style="text-decoration:none" >
                                <i class="fas fa-table"></i>Monitor Penumpang</a>
                        </li>
                        <li>
                            <a href="exp.php" style="text-decoration:none" >
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
                                                    <a href="#" style="text-decoration:none" >Admin</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="logout.php" style="text-decoration:none" >
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
                                    <h2 class="title-1">Edit Data Suspek</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-header">
                                        <strong>Normal</strong> Form
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <div class="form-group">
                                            <input type="hidden" name="id" class="form-control" value="<?php echo $b[
                                                "id_suspek"
                                            ]; ?>">
                                                <label class=" form-control-label">Nomor Penerbangan</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nomor Penerbangan" value="<?php echo $b[
                                                    "nomor_penerbangan"
                                                ]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                            <label class="form-label">Nama Penumpang</label>
                                                <input type="text" name="tnamap" class="form-control" placeholder="Masukkan Nama Penumpang" value="<?php echo $b[
                                                    "nama_penumpang"
                                                ]; ?>" required>
                                            </div>
                                            <div class="form-group">
                                            <label class="form-label">Nama Barang</label>
                                                <input type="text" name="tnamab" class="form-control" placeholder="Masukkan Nama Penumpang" value="<?php echo $b[
                                                    "nama_barang"
                                                ]; ?>" required>
                                            </div>
                                            <div class="mb-2">
                                <label class="form-label">Kategori Barang</label>
                                <select class="form-select" name="tkategoribarang" required>
                                    <?php $kategori_barang =
                                        $b["kategori_barang"]; ?>
                                    <!-- <optgroup label="--Pilih--"></optgroup> -->
                                    <option value="">--Pilih--</option>
                                    <option value="Benda Tajam" <?php echo $kategori_barang ==
                                    "Benda Tajam"
                                        ? "selected"
                                        : ""; ?>>Benda Tajam</option>
                                    <option value="Material Korosif" <?php echo $kategori_barang ==
                                    "Material Korosif"
                                        ? "selected"
                                        : ""; ?>>Material Korosif</option>
                                    <option value="Bahan Peledak" <?php echo $kategori_barang ==
                                    "Bahan Peledak"
                                        ? "selected"
                                        : ""; ?>>Bahan Peledak</option>
                                    <option value="Gas Bertekanan" <?php echo $kategori_barang ==
                                    "Gas Bertekana"
                                        ? "selected"
                                        : ""; ?>>Gas Bertekanan</option>
                                    <option value="Cairan Mudah Terbakar" <?php echo $kategori_barang ==
                                    "Cairan Mudah Terbakar"
                                        ? "selected"
                                        : ""; ?>>Cairan Mudah Terbakar</option>
                                    <option value="Benda Padat Mudah Terbakar" <?php echo $kategori_barang ==
                                    "Benda Padat Mudah Terbaka"
                                        ? "selected"
                                        : ""; ?>>Benda Padat Mudah Terbakar</option>
                                    <option value="Material yang Teroksidasi" <?php echo $kategori_barang ==
                                    "Material yang Teroksidasi"
                                        ? "selected"
                                        : ""; ?>>Material yang Teroksidasi</option>
                                    <option value="Zat Radioaktif" <?php echo $kategori_barang ==
                                    "Zat Radioaktif"
                                        ? "selected"
                                        : ""; ?>>Zat Radioaktif</option>
                                    <option value="Zat Beracun" <?php echo $kategori_barang ==
                                    "Zat Beracun"
                                        ? "selected"
                                        : ""; ?>>Zat Beracun</option>
                                    <option value="Agen Etiologis" <?php echo $kategori_barang ==
                                    "Agen Etiologis"
                                        ? "selected"
                                        : ""; ?>>Agen Etiologis</option>
                                    <option value="Gas Padat" <?php echo $kategori_barang ==
                                    "Gas Padat"
                                        ? "selected"
                                        : ""; ?>>Gas Padat</option>
                                    <option value="Senjata Tajam" <?php echo $kategori_barang ==
                                    "Senjata Tajam"
                                        ? "selected"
                                        : ""; ?>>Senjata Tajam</option>
                                </select>
                                            </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-2">
                                            <label class="form-label">Jumlah</label>
                                            <input type="number" name="tjumlah" class="form-control" placeholder="Masukkan Jumlah Barang" value="<?php echo $b[
                                                "jumlah"
                                            ]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-2">
                                            <label class="form-label">Satuan</label>
                                            <select class="form-select" name="tsatuan" required>
                                                <?php $satuan = $b["satuan"]; ?>
                                                <option value="">---Pilih---</option>
                                                <option value="Unit" <?php echo $satuan ==
                                                "Unit"
                                                    ? "selected"
                                                    : ""; ?>>Unit</option>
                                                <option value="Pcs" <?php echo $satuan ==
                                                "Pcs"
                                                    ? "selected"
                                                    : ""; ?>>Pcs</option>
                                                <option value="Box" <?php echo $satuan ==
                                                "Box"
                                                    ? "selected"
                                                    : ""; ?>>Box</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                <div class="mb-2">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="tstatus" required>
                                            <?php $status = $b["status"]; ?>
                                            <option <?php echo $status ==
                                            "Aktif"
                                                ? "selected"
                                                : ""; ?>>Aktif</option>
                                            <option <?php echo $status ==
                                            "Tidak Aktif"
                                                ? "selected"
                                                : ""; ?>>Tidak Aktif</option>
                                        </select>
                                    </div>  
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success btn-sm" name="bsimpan">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                </div>
                                <?php if (isset($_POST["bsimpan"])) {
                                    // data inputan dari form
                                    $id = $_POST["id"];
                                    $nomor_penerbangan = $_POST["nama"];
                                    $nama_penumpang = $_POST["tnamap"];
                                    $nama_barang = $_POST["tnamab"];
                                    $kategori_barang = $_POST["tkategoribarang"];
                                    $jumlah = $_POST["tjumlah"];
                                    $status = $_POST["tstatus"];
                                    $satuan = $_POST["tsatuan"];
                                    $update = "UPDATE `tb_suspek` SET `nomor_penerbangan`='$nomor_penerbangan',`nama_penumpang`='$nama_penumpang',`nama_barang`='$nama_barang',`kategori_barang`='$kategori_barang',`jumlah`='$jumlah',`satuan`='$satuan',`status`='$status' WHERE `id_suspek`='$id'";
                                    $query = mysqli_query($conn, $update);
                                    if ($query) {
                                        echo '<script>alert("Ubah data berhasil")</script>';
                                        echo '<script>window.location="sus.php"</script>';
                                    } else {
                                        echo "gagal " . mysqli_error($conn);
                                    }
                                } ?>
                        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"></footer>
                        <div class="col d-flex align-items-center">
                            <div class="copyright align-items-center">
                                <p class="text  align-items-center">Copyright © 2023 Telkom-PENS. All rights reserved</p>
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