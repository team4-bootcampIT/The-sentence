<?php
    include 'header.php';
    include 'nav.php';
    if(isset($_SESSION['user'])){
        header("Location: user.php");
exit();

      }

?>
<?php
// Include FB config file && User class
require_once 'fbConfig.php';
require_once 'FUser.php';

if(isset($accessToken)){
	if(isset($_SESSION['facebook_access_token'])){
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}else{
		// Put short-lived access token in session
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler helps to manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		// Set default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

	// Redirect the user back to the same page if url has "code" parameter in query string
	if(isset($_GET['code'])){
		header('Location: ./');
	}

	// Getting user facebook profile info
	try {
		$profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
		$fbUserProfile = $profileRequest->getGraphNode()->asArray();
	} catch(FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// Redirect user back to app login page
		header("Location: ./");
		exit;
	} catch(FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}

	// Initialize User class
	$user = new User();

	// Insert or update user data to the database
	$fbUserData = array(
		'oauth_provider'=> 'facebook',
		'oauth_uid' 	=> $fbUserProfile['id'],
		'first_name' 	=> $fbUserProfile['first_name'],
		'last_name' 	=> $fbUserProfile['last_name'],
		'email' 		=> $fbUserProfile['email'],
		'gender' 		=> $fbUserProfile['gender'],
		'locale' 		=> $fbUserProfile['locale'],
		'picture' 		=> $fbUserProfile['picture']['url'],
		'link' 			=> $fbUserProfile['link']
	);
	$userData = $user->checkUser($fbUserData);

	// Put user data into session
	$_SESSION['userData'] = $userData;

	// Get logout url
	$logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');

	// Render facebook profile data
	if(!empty($userData)){
		$output  = '<h1>Facebook Profile Details </h1>';
		$output .= '<img src="'.$userData['picture'].'">';
        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Facebook';
		$output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
        $output .= '<br/>Logout from <a href="'.$logoutURL.'">Facebook</a>';
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}

}else{
	// Get login url
	$loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

	// Render facebook login button
	$output = '<a href="'.htmlspecialchars($loginURL).'"><img src="images/fblogin-btn.png"></a>';
}
?>
<div><?php echo $output; ?></div>
<main>

    <div id="login-container">
        <div id="poruke1">
            <?php
            //<---- dodao sam novi <div> id poruke1, u kojem ce se prema kodu success stvari prikazivati text (trebat ce dotjerat) ---->
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url,'reg=success') !== false){
              echo 'Registration successful!<br>Log in!!';
              }

if (strpos($url,'good=act') !== false){

    echo 'Your account is now activated!';}
            //<---------------------------------------------------------------------------------------------------------------------->
          ?>
        </div>

        <div id="poruke">
            <?php
            //<---- dodao sam novi <div> id poruke, u kojem ce se prema kodu errora prikazivati text errora (trebat ce dotjerat) ---->
            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if (strpos($url,'error=missmatch') !== false){
            echo 'Username or password incorrect!';
            }
            if (strpos($url,'error=notlogged') !== false){
            echo 'Log in for user area!';
            }
            //<---------------------------------------------------------------------------------------------------------------------->
            ?>
        </div>

        <form action="include/login.include.php" method="POST" id="form-container">

            <div class="input-wrapper">
                <span class="icon-wrapper">
                    <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                </span>
                <input type="text" class="input-login" name="loguser" placeholder="Username or email"  autofocus>
            </div>


<!-- ------------------------------------------------ -->
<!-- ovo je uključeno kako bi se mogao prikazivati password
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="path/to/hideShowPassword.min.js"></script>-->
<!-- ------------------------------------------------ -->

            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password"  class="input-login" id="id-password" name="password" placeholder="Password"   required>

                <span id="show-hide-checkbox" class="show-hide-eye" onclick="eyeOfTheTiger()">
                    <i id="ikonica" class="fa fa-eye fa-lg" aria-hidden="true"></i>
                </span>
            </div>


<!-- ------------------------------------------------ -->
            <button name="loginSubmit" type="submit" id="submit-button">Login</button>

            <div class="remember-container bordery">
                <label class="switch">  -->
                    <input type="checkbox" id="remember-me-checkbox" name="remember" value="true">
                    <div class="slider round"></div>
                </label>
                <span class="remember-login-text bordery">Remember me?</span>
            </div>

        </form>

        <p class="email-or-social">OR</p>

        <button class="social-login" id="facebook-login">

            <span class="icon-wrapper" id="icon-wrapper-facebook">
                <i class="fa fa-facebook fa-lg" aria-hidden="true"></i>
            </span>
            <div class="social-login-text">
                Login with Facebook
            </div>
        </button>

        <button class="social-login" id="google-login">

            <span class="icon-wrapper" id="icon-wrapper-google">
                <i class="fa fa-google fa-lg" aria-hidden="true"></i>
            </span>
            <div class="social-login-text">
                Login with Google
            </div>
        </button>

        <?php
            if(isset($_SESSION['user'])) {
              echo $_SESSION['user'] ;
            }
        ?>
    </div>
</main>

<?php
    include 'footer.php';
?>
