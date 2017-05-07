<?php
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>The Sentence Login</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <script src="https://use.fontawesome.com/f24e56ad22.js"></script>

</head>

<body>
    <div id="login-container">
        <form id="form-container" action="login.php" method="POST">

            <div class="input-wrapper bordery">
                <div class="icon-wrapper bordery">
                    <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                </div>

                    <input type="text" class="input-login bordery" name="username" placeholder="Username" autofocus>    <!-- required -->

            </div>

            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password" class="input-login" name="password" placeholder="Password">
            </div>


            <div class="remember-container">
                <label class="switch">
                  <input type="checkbox">
                  <div class="slider round"></div>
                </label>
                <span class="remember-login-text">Remember login?</span>
            </div>

            <button type="submit" id="submit-button">Login</button>
        </form>

        <?php
        if(isset($_SESSION['user'])){
          echo $_SESSION['user'] ;
          echo " you're logged in";
        }
        else{
          echo "You're not logged in";
        }
         ?>
     <form action="logout.php">
         <button  id="submit-button">Logout</button>
     </form>
    </div>

</body>
</html>
