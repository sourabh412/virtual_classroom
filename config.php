<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('533019886447-6u9n4htee52b9gf264sn75i0k2uogiv6.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/VirClass/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

// connecting to db
$server = "localhost";
$username = "root";
$password = "";
$db = "3rdSemWAD";

$con = mysqli_connect($server, $username, $password, $db);

?> 