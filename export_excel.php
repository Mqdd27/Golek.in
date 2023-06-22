<?php
session_start();
include 'db.php';
if (!$conn) {
  die("<script>alert('Gagal tersambung dengan database.')</script>");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Export Data Ke Excel</title>
</head>

<body>
  <style type="text/css">
    body {
      font-family: sans-serif;
    }

    table {
      margin: 20px auto;
      border-collapse: collapse;
    }

    table th,
    table td {
      border: 1px solid #3c3c3c;
      padding: 3px 8px;

    }

    a {
      background: blue;
      color: #fff;
      padding: 8px 10px;
      text-decoration: none;
      border-radius: 2px;
    }
  </style>
  <?php
  $includeTime = $_GET['include_time'] ?? true;
  $tangwaltok = toDate_ID($_GET['tanggal_awal'], false);
  $tangkirtok = toDate_ID($_GET['tanggal_akhir'], false);

  $name_for_project = $tangwaltok . ' - ' . $tangkirtok;
  $exportTitle = 'Data_' . $tangwaltok . '_' . $tangkirtok . '.xls';
  $filename = $name_for_project . ".xls";

  header("Content-type: application/vnd-ms-excel");
  header('Content-disposition: attachment; filename=Laporan Data Suspek ' . $filename);
  ?>
  <center>
    <h4>Laporan Datasuspek<br>
      Terminal 1 Bandara Juanda Surabaya<br>
      Periode
      <?= $tangwaltok ?> hingga
      <?= $tangkirtok ?>
    </h4>
  </center>
  <table border="1" width="100%">
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">Nomor Penerbangan</th>
      <th class="text-center">Nama Penumpang</th>
      <th class="text-center">Nomor HP</th>
      <th class="text-center">Nama Barang</th>
      <th class="text-center">Kategori Barang</th>
      <th class="text-center">Jumlah</th>
      <th class="text-center">Tanggal</th>
    </tr>
    <!-- Menampilkan Data yang ada di Database -->
    <?php
    $no = 1;
    $tangwal = $_GET['tanggal_awal'] . " 00:00:00";
    $tangkir = $_GET['tanggal_akhir'] . " 23:59:59";
    $tampil = mysqli_query($conn, "SELECT * FROM `tb_suspek` WHERE tanggal_simpan BETWEEN '$tangwal' AND  '$tangkir' ORDER BY tanggal_simpan ASC");
    while ($data = mysqli_fetch_array($tampil)) {
      ?>
      <tr>
        <td>
          <?= $no++ ?>
        </td>
        <td>
          <?= $data['nomor_penerbangan'] ?>
        </td>
        <td>
          <?= $data['nama_penumpang'] ?>
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
        <td>
          <?= toDate_ID($data['tanggal_simpan'], $includeTime) ?>
        </td>
      <?php } ?>
    </tr>
  </table>
  <br>
  <br>
  <center>
    <table>
      <tr>
        <th></th>
        <th class="text-center">Mengetahui</th>
      </tr>
    </table>
  </center>
  <br>
  <br>
  <br>
  <table>
    <tr>
      <td></td>
      <td>_____________________</td>
    </tr>
  </table>

  <?php
  function toDate_ID($tanggal, $includeTime = false)
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
    $formattedDate = $var[0] . ' ' . $month[(int) $var[1]] . ' ' . $var[2];

    if ($includeTime) {
      $formattedDate .= ' ' . $hour_now;
    }

    return $formattedDate;
  }
  ?>

</body>

</html>