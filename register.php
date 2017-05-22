<?php
    include 'header.php';
    include 'nav.php';
?>

<main>
    <div id="register-container">
        <form action="include/signup.include.php" method="POST" id="form-container">

            <div id="poruke">
                <?php
                //<---- dodao sam novi <div> id poruke, u kojem ce se prema kodu errora prikazivati text errora (trebat ce dotjerat) ---->
                $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

                if (strpos($url,'error=uempty') !== false){
                echo 'Username is required field!';
                }
                if (strpos($url,'error=pempty') !== false){
                echo 'Password is required field!';
                }
                if (strpos($url,'error=eempty') !== false){
                echo 'Email is required field!';
                }
                if (strpos($url,'error=paempty') !== false){
                echo 'Repeat password is required field!';
                }
                if (strpos($url,'error=pmis') !== false){
                echo 'Password missmatch!';
                }
                if (strpos($url,'error=username') !== false){
                echo 'Username already in use!';
                }
                if (strpos($url,'error=exemail') !== false){
                echo 'Email already registered!';
                }

                //<---------------------------------------------------------------------------------------------------------------------->
                ?>
            </div>

            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                </div>
                <input type="text" class="input-login" name="username" placeholder="Username" pattern=".{6,32}" title="Username has to be between 6 and 20 characters long" required autofocus>
            </div>

            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                </div>
                <input type="email" class="input-login" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  title="Write your real email" required>
            </div>

            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password" class="input-login" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,64}" title="Password has to be at least 12 characters long" required>
            </div>

            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password" class="input-login" name="passworda" placeholder="Repeat password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{12,64}" title="Password has to be at least 12 characters long" required>
            </div>
   <!--
            <div class="remember-container">
                <label class="switch">
                    <input type="checkbox">
                    <div class="slider round"></div>
                </label>
                <span class="remember-login-text">Remember login?</span>
            </div>
  -->
            <button type="submit" id="submit-button">Create account</button>
        </form>
    </div>
</main>


<?php
    include 'footer.php';
?>
