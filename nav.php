<nav id="main-nav">
    <!-- nav-wrapper max-širine 810px tako da cijela navigacija ima istu širinu -->
    <div id="nav-wrapper">
        <!-- clickable div, kad se klikne spusti se menu. pojavi se samo na manjim ekranima -->
        <div id="menuIcon">
            <a> <!-- Menu icon made of three divs, instead of icon, because it loads faster -->
                <div class="menuIconLine"></div>
                <div class="menuIconLine"></div>
                <div class="menuIconLine"></div>
            </a>
        </div>

        <!--  -->
        <ul id="list-nav">
            <li><a class="nav-link" href="index.php">Home</a></li>
            <li><a class="nav-link" href="#">About</a></li>
            <li><a class="nav-link" href="#">Contact</a></li>
        </ul>

        <div class="nav-login-container">

           <?php
              if(isset($_SESSION['user'])){
                  echo $_SESSION['user'] ;
                       echo"  <a href='change.php'><button type='button' class='nav-button' >Change password</button></a>
                              <a href='include/logout.include.php'><button type='button' class='nav-button'>Logout</button></a>";

              }
              else{
                  echo"  <a href='login.php'><button type='button' class='nav-button' >Login</button></a>
                         <a href='register.php'><button type='button' class='nav-button'>Register</button></a>";
              }
            ?>
        </div>
    </nav>
