<?php

include 'header.php';

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

    <main>
        <div class="main-article-container">
            <div class="article-container">
                <img class="article-image" src="http://placehold.it/230x140">
                <h3>Naslov</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod. Donec rutrum vitae libero vitae malesuada.</p>
            </div>
            <div class="article-container">
                <img class="article-image" src="http://placehold.it/230x140">
                <h3>Naslov</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod. Donec rutrum vitae libero vitae malesuada.</p>
            </div>
            <div class="article-container">
                <img class="article-image" src="http://placehold.it/230x140">
                <h3>Naslov</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod. Donec rutrum vitae libero vitae malesuada.</p>
            </div>
        
            <div class="article-container">
                <img class="article-image" src="http://placehold.it/230x140">
                <h3>Naslov</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod. Donec rutrum vitae libero vitae malesuada.</p>
            </div>
            <div class="article-container">
                <img class="article-image" src="http://placehold.it/230x140">
                <h3>Naslov</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod. Donec rutrum vitae libero vitae malesuada.</p>
            </div>
            <div class="article-container">
                <img class="article-image" src="http://placehold.it/230x140">
                <h3>Naslov</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod. Donec rutrum vitae libero vitae malesuada.</p>
            </div>
        </div>


    </main>










<!-- ................ LOGIN FORMAAAAAAAA ..................

    <div id="login-container">
        <form id="form-container">

            <div class="input-wrapper">
                <div class="icon-wrapper">
                    <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                </div>
                
                    <input type="text" class="input-login" name="username" placeholder="Username" autofocus>    
                
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

            <button type="button" id="submit-button">Login</button>
        </form>
    </div>
-->
</body>
</html>