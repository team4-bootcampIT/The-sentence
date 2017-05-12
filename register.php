<?php

/* include 'connect.php';   */
include 'header.php';


?>

<body>
    <nav id="main-nav">
        <ul>
            <li><a class="nav-link" href="index.php">Home</a></li>
            <li><a class="nav-link" href="#">About</a></li>
            <li><a class="nav-link" href="#">Contact</a></li>
            <li class="nav-login-container">

                <a href="login.php"><button type="button" class="nav-button" >Login</button></a>
                <a href="register.php"><button type="button" class="nav-button">Register</button></a>
            </li>
        </ul>
    </nav>








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
                    <input type="text" class="input-login" name="username" placeholder="Username" autofocus>    
            </div>

            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                </div>
                
                    <input type="email" class="input-login" name="email" placeholder="Email" autofocus>    
                
            </div>
          
            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password" class="input-login" name="password" placeholder="Password">
            </div>
          
            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                </div>
                <input type="password" class="input-login" name="passworda" placeholder="Repeat password">
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

</body>
</html>