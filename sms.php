<?php
require(__DIR__.'\vendor\twilio\sdk\src\Twilio\autoload.php');

use Twilio\Rest\Client;

$sid = getenv('AC023ccd085f3d79fa023113d340ed0e64');
$token = getenv('620030a07ea5be0a48f579e21003c0a9');
$client = new Client($sid, $token);

// Specify the phone numbers in [E.164 format](https://www.twilio.com/docs/glossary/what-e164) (e.g., +16175551212)
// This parameter determines the destination phone number for your SMS message. Format this number with a '+' and a country code
$phoneNumber = "+6281385725491";

// This must be a Twilio phone number that you own, formatted with a '+' and country code
$twilioPurchasedNumber = "+14302335886";

// Send a text message
$message = $client->messages->create(
    $phoneNumber,
    [
        'from' => $twilioPurchasedNumber,
        'body' => "Segera Hubungi Posko AVSEC Untuk Melakukan Pengecekan Bagasi"
    ]
);
print("Message sent successfully with sid = " . $message->sid ."\n\n");

// Print the last 10 messages
$messageList = $client->messages->read([],10);
foreach ($messageList as $msg) {
    print("ID:: ". $msg->sid . " | " . "From:: " . $msg->from . " | " . "TO:: " . $msg->to . " | "  .  " Status:: " . $msg->status . " | " . " Body:: ". $msg->body ."\n");
}
?>