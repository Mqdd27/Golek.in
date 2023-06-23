// Send an SMS using Twilio's REST API and PHP
<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Your Account SID and Auth Token from console.twilio.com
$sid = "AC023ccd085f3d79fa023113d340ed0e64";
$token = "*******************************";
$client = new Twilio\Rest\Client($sid, $token);

$phoneNumber = '+'.$_GET['nomor'];
//$pesan = $_GET['pesan'];
$pesan= "Segera Hubungi Posko AVSEC Untuk Melakukan Pengecekan Bagasi";
//echo $pesan . $phoneNumber;


// Use the Client to make requests to the Twilio REST API
$client->messages->create(
    // The number you'd like to send the message to
    $phoneNumber,
    [
        // A Twilio phone number you purchased at https://console.twilio.com
        'from' => '+14302335886',
        // The body of the text message you'd like to send
        'body' => $pesan
    ]
);
echo "<script>
              alert('Berhasil Mengirim Pesan');
              document.location='dashbrot.php';
          </script>";
?>