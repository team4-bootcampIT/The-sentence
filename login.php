<?php

include "header.php";
 ?>



<body>
    <nav id="main-nav">
        <ul>
            <li><a class="nav-link" href="index.php">Home</a></li>
            <li><a class="nav-link" href="#">About</a></li>
            <li><a class="nav-link" href="#">Contact</a></li>
            <li class="nav-login-container">
<?php
if(isset($_SESSION['user'])){
       echo $_SESSION['user'] ;
         echo"  <a href='change.php'><button type='button' class='nav-button' >Change</button></a>
                <a href='include/logout.include.php'><button type='button' class='nav-button'>Logout</button></a>";

      }
      else{
              echo"  <a href='login.php'><button type='button' class='nav-button' >Login</button></a>
                <a href='register.php'><button type='button' class='nav-button'>Register</button></a>";
            }
    ?>
            </li>
        </ul>
    </nav>




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
                <div class="icon-wrapper">
                    <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                </div>
                
                    <input type="text" class="input-login" name="loguser" placeholder="Username or email" autofocus>    
                
            </div>
            
            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password" class="input-login" name="password" placeholder="Password">
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
            <button type="submit" id="submit-button">Login</button>
        </form>
        <?php
 
      if(isset($_SESSION['user'])){
        echo $_SESSION['user'] ;
       

      }
     
       ?>
    </div>

</body>
</html>