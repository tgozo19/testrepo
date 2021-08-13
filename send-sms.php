<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = "AC7d503e9dfeba409fba17b865bcb6a92d";
$token = "5489524b690ddff25a2e2d6ceea775ac";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("+263785991512", // to
                           [
                               "body" => "jjjj",
                               "from" => "+18565954432"
                           ]
                  );


print($message->status);