<?php

include 'header.php';

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
                <div class="article-image-container">
                    <img class="article-image" src="https://unsplash.it/230/140?image=1083">
                    <h4>travel</h4>
                </div>
                <h3>Najljepše destinacije</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod.</p>
            </div>
            <div class="article-container">
                <div class="article-image-container">
                    <img class="article-image" src="https://unsplash.it/230/140?image=491">
                    <h4>hobi</h4>
                </div>
                <h3>Od hobija do obrta</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod.</p>
            </div>
            <div class="article-container">
                <div class="article-image-container">
                    <img class="article-image" src="https://unsplash.it/230/140?image=1059">
                    <h4>dom</h4>
                </div>
                <h3>Retro kuće</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod.</p>
            </div>
        
            <div class="article-container">
                <div class="article-image-container">
                    <img class="article-image" src="https://unsplash.it/230/140?image=1043">
                    <h4>travel</h4>
                </div>
                <h3>Galerija veličanstvene prirode</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod.</p>
            </div>
            <div class="article-container">
                <div class="article-image-container">
                    <img class="article-image" src="https://unsplash.it/230/140?image=1024">
                    <h4>životinje</h4>
                </div>
                <h3>Vrsta pred izumiranjem?</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod.</p>
            </div>
            <div class="article-container">
                <div class="article-image-container">
                    <img class="article-image" src="https://unsplash.it/230/140?image=1002">
                    <h4>ekologija</h4>
                </div>
                <h3>Ekološka katastrofa kod Meksika</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod.</p>
            </div>     

            <div class="article-container">
                <div class="article-image-container">
                    <img class="article-image" src="https://unsplash.it/230/140?image=967">
                    <h4>znanost</h4>
                </div>
                <h3>NASA otkrila novi planet</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod. Donec rutrum vitae libero vitae malesuada.</p>
            </div>
            <div class="article-container">
                <div class="article-image-container">
                    <img class="article-image" src="https://unsplash.it/230/140?image=1013">
                    <h4>obitelj</h4>
                </div>
                <h3>Vjenčanje iz snova</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam consectetur diam ac ipsum ultrices euismod. Donec rutrum vitae libero vitae malesuada.</p>
            </div>
            <div class="article-container">
                <div class="article-image-container">
                    <img class="article-image" src="https://unsplash.it/230/140?image=1001">
                    <h4>obitelj</h4>
                </div>
                <h3>Što čini dobrog roditelja?</h3>
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