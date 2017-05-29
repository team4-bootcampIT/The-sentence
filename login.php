<?php
  //  include 'FUser.php';
    include 'header.php';
    include 'nav.php';
    if(isset($_SESSION['user'])){
        header("Location: user.php");
exit();

      }

?>
<main>

<!--
    kod koji se treba staviti iznad, na $output = '<a href="'.htmlspecialchars($loginURL).'">,
    kako bi se prikazao button za facebook login
        <button  class="social-login" id="facebook-login">
            <span class="icon-wrapper" id="icon-wrapper-facebook">
                <i class="fa fa-facebook fa-lg" aria-hidden="true"></i>
            </span>
            <div class="social-login-text">
                Login with Facebook
            </div>
        </button>

-->
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



        <?php
        // Inkludanje fajlova koji su potrebni za logiranje pomocu facebooka
        require_once 'fbConfig.php';
        require_once 'FUser.php';

        if(isset($accessToken)){
        	if(isset($_SESSION['facebook_access_token'])){
        		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
        	}else{
        		// Dodavanje tokena
        		$_SESSION['facebook_access_token'] = (string) $accessToken;

        	  	// OAuth 2.0 client handler nesto od facebooka za tokene
        		$oAuth2Client = $fb->getOAuth2Client();

        		// izmjena tokena dobivanje dugoživuceg tokena
        		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

        		// dodavanje tokena u skriptu za provjeru
        		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
        	}

        	// Vracanje korisnika vnazad ako ima kod  to je ono code= bla bla bla ovo je tu za test meni nesto najverojatnije kasnije ide ca
        	if(isset($_GET['code'])){
        		header('Location: ./');
        	}

        	// Dohvacanje  podataka
        	try {
        		$profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
        		$fbUserProfile = $profileRequest->getGraphNode()->asArray();
        	} catch(FacebookResponseException $e) {
        		echo 'Graph returned an error: ' . $e->getMessage();
        		session_destroy();
        		// Vracanje nazad na lokaciju .. isto netreba najverojatnije  pogotov za graphove koje necemo niti koristiti al aj dobro
        		header("Location: ./");
        		exit;
        	} catch(FacebookSDKException $e) {
        		echo 'Facebook SDK returned an error: ' . $e->getMessage();
        		exit;
        	}

        	//stvori novu klasu korisnik
        	$user = new User();

        	// dodavanje i vracanje podataka u array
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

        	// dodavanje podataka u sesiju
        	$_SESSION['userData'] = $userData;

        	// Logout url ... ovo treba tu povezat sa logout buttonom
        	$logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');

        	// ispis podataka
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
        	// ovo treba povezat sa loginbuttonom
        	$loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

        	//  I ovo tu!
        	$output = '<a href="'.htmlspecialchars($loginURL).'">
                            <button  class="social-login" id="facebook-login">
                                <span class="icon-wrapper" id="icon-wrapper-facebook">
                                    <i class="fa fa-facebook fa-lg" aria-hidden="true"></i>
                                </span>
                                <div class="social-login-text">
                                    Login with Facebook
                                </div>
                            </button>
                        </a>';
        }
        // ovo tu ispod je ispis cisti dodan u neki div tek tolko
        ?>
        <div><?php echo $output; ?></div>

<!--
        <button  class="social-login" id="facebook-login">
            <span class="icon-wrapper" id="icon-wrapper-facebook">
                <i class="fa fa-facebook fa-lg" aria-hidden="true"></i>
            </span>
            <div class="social-login-text">
                Login with Facebook
            </div>
        </button>
-->
        <a href="google/google.php"><button class="social-login" id="google-login">
            <span class="icon-wrapper" id="icon-wrapper-google">
                <i class="fa fa-google fa-lg" aria-hidden="true"></i>
            </span>
            <div class="social-login-text">
                Login with Google
            </div>
        </button>
		</a>

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
