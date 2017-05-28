<?php
if(!session_id()){
	session_start();
}

// Dodavanje autoloadera iz Faacebook SDK kita (vezano za  nekakv njihov login sa tokenima)
require_once __DIR__ . '/facebook-php-sdk/autoload.php';

// Dodavanje facebook libarija
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

/*
 * Konfiguracija za povezivanjem sa facebookom
 */
$appId 			= '1900306316917151'; //Facebook App ID
$appSecret 		= '18bc8f251ca15759da8ea08042e1088f'; //Facebook App Secret
$redirectURL 	= 'http://localhost/trunk/login.php'; //Callback URL
$fbPermissions 	= array('email');  
// stvaranje Arejja sa podacima vezanim za facebook
$fb = new Facebook(array(
	'app_id' => $appId,
	'app_secret' => $appSecret,
	'default_graph_version' => 'v2.2',
));

//Ovo tu nesto treba i sa ovim sam se jebo 2 dana i jos uvjek neznam sta radi .. ali radi!
$helper = $fb->getRedirectLoginHelper();
$_SESSION['FBRLH_state']=$_GET['state'];

// Pokusaj dobivanje tokena 
try {
	if(isset($_SESSION['facebook_access_token'])){
		$accessToken = $_SESSION['facebook_access_token'];
	}else{
  		$accessToken = $helper->getAccessToken();
	}
} catch(FacebookResponseException $e) {
 	echo 'Graph returned an error: ' . $e->getMessage();
  	exit;
} catch(FacebookSDKException $e) {
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
}

?>
