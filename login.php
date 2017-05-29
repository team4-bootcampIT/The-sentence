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

      <a href ="facebookinfo.php">  <button class="social-login" id="facebook-login">
            <span class="icon-wrapper" id="icon-wrapper-facebook">
                <i class="fa fa-facebook fa-lg" aria-hidden="true"></i>
            </span>
            <div class="social-login-text">
                Login with Facebook
            </div>
        </button>
      </a>

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
