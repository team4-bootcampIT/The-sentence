<?php

include "header.php";
 ?>



<body>
    <nav id="main-nav">
        <ul>
            <li><a class="nav-link" href="index.php">Home</a></li>
            <li><a class="nav-link" href="#">About</a></li>
            <li><a class="nav-link" href="#">Contact</a></li>
            <li class="nav-login-container bordery">
<?php
if(isset($_SESSION['user'])){
       echo $_SESSION['user'] ;
         echo"  <a href='change.php'><button type='button' class='nav-button bordery' >Change password</button></a>
                <a href='include/logout.include.php'><button type='button' class='nav-button bordery'>Logout</button></a>";

      }
      else{
              echo"  <a href='login.php'><button type='button' class='nav-button bordery' >Login</button></a>
                <a href='register.php'><button type='button' class='nav-button bordery'>Register</button></a>";
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

  if (strpos($url,'good=changed') !== false){
  echo 'Your password is changed!';
  }

 
//<---------------------------------------------------------------------------------------------------------------------->
  ?>
  </div>
    <div id="poruke"> 
 <?php

//<---- dodao sam novi <div> id poruke, u kojem ce se prema kodu errora prikazivati text errora (trebat ce dotjerat) ---->
  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

  if (strpos($url,'error=missmatch1') !== false){
  echo 'Old password incorrect!';
  }
    if (strpos($url,'error=missmatch2') !== false){
  echo 'New password missmatch!';
  }
   
 
//<---------------------------------------------------------------------------------------------------------------------->
  ?>
  </div>
        <form action="include/change.include.php" method="POST" id="form-container">


            
            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password" class="input-login" name="password" placeholder="Old Password">
            </div>

               <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password" class="input-login" name="password1" placeholder="New password">
            </div>

               <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password" class="input-login" name="password2" placeholder="Confirm new password">
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
            <button type="submit" id="submit-button">Change password</button>
        </form>
     
    </div>

</body>
</html>