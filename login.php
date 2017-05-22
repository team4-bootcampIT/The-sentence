<?php
    include 'header.php';
    include 'nav.php';
?>


<main>
    <div id="login-container">
        <div id="poruke1">
            <?php


            //<---- dodao sam novi <div> id poruke1, u kojem ce se prema kodu success stvari prikazivati text (trebat ce dotjerat) ---->
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

              if (strpos($url,'reg=success') !== false){
              echo 'Registration successful!<br>Log in!!';
              }


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
                <input type="text" class="input-login" name="loguser" placeholder="Username or email" pattern=".{6,20}" title="Username has to be between 6 and 20 characters long" required autofocus>
            </div>


<!-- password show hide s okom -->
            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password"  class="input-login" id="id-password" name="password" placeholder="Password" pattern=".{12,64}" title="Password has to be at least 12 characters long" required>

                <span id="show-hide-checkbox" class="show-hide-eye" onclick="eyeOfTheTiger()">
                    <i id="ikonica" class="fa fa-eye fa-lg" aria-hidden="true"></i>
                </span>
            </div>
<!-- password kraj -->





            <button type="submit" id="submit-button">Login</button>

            <div class="remember-container bordery">
                <label class="switch">  -->
                    <input type="checkbox" id="remember-me-checkbox">
                    <div class="slider round"></div>
                </label>
                <span class="remember-login-text bordery">Remember me?</span>
            </div>

        </form>

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
