<?php
session_start();
include 'db.php';
if ($_SESSION['login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
// Menanpilkan data dari tabel tb_penumpang
$penumpang = mysqli_query($conn, "SELECT * FROM tb_penumpang WHERE id_penumpang = '" . $_GET['id'] . "' ");
if (mysqli_num_rows($penumpang) == 0) {
    echo '<script>window.location="dashboard.php"</script>';
}
$b = mysqli_fetch_object($penumpang);

if (isset($_POST['bsimpan'])) {

    // data inputan dari form
    $nomor_penerbangan = $_POST['nomor'];
    $nama_penumpang = $_POST['tnamap'];
    $status = $_POST['tstatus'];
    $update = mysqli_query($conn, "INSERT INTO `tb_suspek`(`id_suspek`, `nomor_penerbangan`, `nama_penumpang`, `kategori_barang`, `jumlah`, `satuan`, `tanggal`, `status`) VALUES (null,'$nomor_penerbangan','$nama_penumpang','','', '', '', '$status')");
    if ($update) {
        echo '<script>alert("Ubah data berhasil")</script>';
        echo '<script>window.location="dashboard.php"</script>';
    } else {
        echo 'gagal ' . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <link rel="icon" type="image/ico" href="images/favicon.ico">
    <title>Edit Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>

    <!-- Nav Bar Start -->
    <nav class="navbar navbar-expand-lg" style="background-color: #ffc61d;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Golek.in</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashbrot.php">Kembali</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav Bar END -->

    <!-- Awal Kontainer -->
    <div class="container">
        <ul></ul>
        <h3 class="text-center">Edit Data Penumpang</h3>
        <ul></ul>

        <!-- Awal Row -->
        <div class="row">
            <!-- Awal col -->
            <div class="col-md-8 mx-auto">
                <!-- Awal card -->
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Form Edit Data Penumpang
                    </div>
                    <div class="card-body">
                        <!-- Awal form -->
                        <form method="post">
                            <div class="mb-2">
                                <label class="form-label">Nomor Penerbangan</label>
                                <input type="text" name="nomor" class="form-control"
                                    placeholder="Masukkan Nomor Penerbangan" value="<?php echo $b->nomor ?>" required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Nama Penumpang</label>
                                <input type="text" name="tnamap" class="form-control"
                                    placeholder="Masukkan Nama Penumpang" value="<?php echo $b->nama_penumpang ?>"
                                    required>
                            </div>
                            <label class="form-label">Status</label>
                            <select name="tstatus" class="form-select">
                                <option>Aktif</option>
                                <option>Tidak Aktif</option>
                            </select>
                            <div class="text-center">
                                <hr>
                                <button class="btn btn-primary" name="bsimpan" type="submit">Simpan</button>
                                <!-- <a href="dashboard.php"><button class="btn btn-danger" name="bbatal">Batalkan</button></a> -->
                            </div>
                    </div>
                    </form>
                    <!-- Akhir form -->
                </div>
                <div class="card-footer bg-primary">

                </div>
            </div>
            <!-- Akhir card -->
        </div>
        <!-- Akhir col -->
    </div>
    <!-- Akhir Row -->

    </div>
    <!-- Akhir Kontainer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
</body>

</html>