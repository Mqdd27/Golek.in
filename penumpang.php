<?php
session_start();
include 'db.php';
if (!$conn) {
  die("<script>alert('Gagal tersambung dengan database.')</script>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="image/ico" href="images/favicon.ico">
  <title>Display</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Refresh Page -->
  <meta http-equiv="refresh" content="30">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

  <title>Baggage Check</title>

  <style>
    body {
      background-image: url("images/test.png");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }

    .blink {
      animation: blinker 1.5s linear infinite;
      color: red;
      font-family: sans-serif;
    }

    @keyframes blinker {
      50% {
        opacity: 0;
      }
    }
  </style>
</head>

<body onload="startTime()">
  <header>
    <div class="container mt-5 mb-2">
      <div class="row">
        <div class="col">
          <nav class="navbar navbar-light">
            <a href="#" class="navbar-brand">
              <h1>Airport Baggage Check Service</h1>
            </a>
            <div class="form-inline">
              <h4 class="mr-2" id="currentDate"></h4>
              <h4 class="" id="currentTime"></h4>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row d-flex justify-content-center">
      <table class="table table-light table-stripped table-striped text-center shadow rounded-lg">
        <thead class="thead-dark">
          <tr>
            <th>No.</th>
            <th>Nomor Penerbangan</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <!-- Menampilkan Data yang ada di Database -->

          <?php
          $no = 1;
          $tampil = mysqli_query($conn, "SELECT * FROM `tb_suspek` WHERE `status` like 'Aktif' ORDER BY `tanggal_simpan` DESC;");
          while ($data = mysqli_fetch_array($tampil)) {
            $nama_penumpang = explode("-", $data['nama_penumpang']); // Split the names by hyphen
            $implode_nama = implode(" ", $nama_penumpang); // Implode the names with space
            ?>
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
                <?= toDate_ID($data['tanggal_simpan']) ?>
              </td>
              <td class="blink">
                <?= $data['status'] ?>
              </td>
            <?php } ?>
          <tr>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col">
        <div class="alert alert-info text-center" role="alert">
          Bagi Nama yang Tertera Segera Hubungi Posko AVSEC
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <!-- <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span> -->
        <marquee onmouseout='this.start()' onmouseover='this.stop()' scrollamount='10'><img src="images/ap1logo.png"
            width="60" height="30" />&nbsp&nbspSELAMAT DATANG DI TERMINAL 1 BANDAR UDARA INTERNASIONAL JUANDA
          SURABAYA&nbsp&nbsp<img src="images/ap1logo.png" width="60" height="30" />&nbsp&nbspJANGAN MENINGGALKAN BARANG
          BAWAAN ANDA TANPA PENGAWASAN&nbsp&nbsp<img src="images/ap1logo.png" width="60" height="30" />&nbsp&nbspDO NOT
          LEAVE YOUR LUGGAGE UNATTENDED&nbsp&nbsp<img src="images/ap1logo.png" width="60" height="30" />&nbsp&nbspSILENT
          AIRPORT SUDAH DIBERLAKUKAN, MOHON PARA PENUMPANG SELALU MEMPERHATIKAN INFORMASI PENERBANGAN PADA MONITOR FIDS
          YANG TERSEDIA. TERIMAKASIH.&nbsp&nbsp<img src="images/ap1logo.png" width="60" height="30" />&nbsp&nbspSILENT
          AIRPORT POLICY HAS BEEN ENFORCED, PASSANGERS ARE ADVISED TO CHECK FLIGHT INFORMATION ON AVAILABLE FIDS SCREEN.
          THANK YOU.&nbsp&nbsp</marquee>
      </div>
    </footer>
  </div>

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