<?php
session_start();
 
include_once 'src/Google_Client.php';
include_once 'src/Google_Oauth2Service.php';


//konfiguracija i postavljanje Google API, podaci sa Google developers console
$clientId = '252015222418-qq255jpdirkdc19m8utsn9imcj7vjj0v.apps.googleusercontent.com';
$clientSecret = 'Fv3fNR7hvJ1hJR1mYqqMxfqT';
$redirectURL = 'http://localhost/google/google.php';

//pozivanje Google API
$gClient = new Google_Client();
$gClient->setApplicationName('The sentence webpage');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>