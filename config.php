<?php
require('./vendor/autoload.php');

# Add your client ID and Secret
$client_id = "942421853266-cc4gai295f2kb2fnp5h710cd3ombuc4c.apps.googleusercontent.com";
$client_secret = "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";

$client = new Google\Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);

# redirection location is the path to login.php
$redirect_uri = 'http://localhost/website/login.php';
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

?>