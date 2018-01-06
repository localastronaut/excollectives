SDK Version: 5.x
<?php
// NOTE: This example uses the next generation Twilio helper library - for more
// information on how to download and install this version, visit
// https://www.twilio.com/docs/libraries/php
require_once '/path/to/vendor/autoload.php';

use Twilio\Rest\Client;

// Your Account SID and Auth Token from https://www.twilio.com/console
$accountSid = "AC489166323fd7455761e701d81b3d8544";
$authToken = "02a2ba494f915825a619aa91c881e3c2";

$serviceSid = "ISe1044bb4bf05a03a2a70efe3cd1a9f4d";

// Initialize the client
$client = new Client($accountSid, $authToken);

// Create a binding
$binding = $client
    ->notify->services($serviceSid)
    ->bindings->create(
        '00000001', // We recommend using a GUID or other anonymized identifier for Identity.
        'sms',
        '+13108485464'
    );

echo $binding->sid;
