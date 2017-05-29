<?php

include_once 'gpConfig.php';
include_once 'gUser.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//povlacenje korisnickih podataka s Google-a
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//deklariranje objekta klase User
	$user = new User();
	
	//upisivanje ili azuriranje korisnickih podataka u bazi
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
		'username'		=> $gpUserProfile['given_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
	
	//spremanje korisnickih podataka u sesiju
	$_SESSION['userData'] = $userData;
	
	//povlacenje korisnickih podataka za ispis
    if(!empty($userData)){
		
        $output = '<h1>Google+ Profile Details</h1>';
        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';

// postavljam $_SESSION tako da user.php radi bez da se korisnik mora ponovno logirati
		$_SESSION['user']= $userData['first_name'];	
// dodajem gumb koji logiranog korisnika vodi na user.php		
		$output .= '<br/><br/><a href="../user.php"><button type="button" class="nav-button">Go to The sentence webpage</button></a>';
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to The Sentence with Google</title>
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
</head>
<body>
<div><?php echo $output; ?></div>
</body>
</html>