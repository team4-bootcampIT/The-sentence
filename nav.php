<<<<<<< .mine
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
           include "connect.php";

              /* ako si logiran, onda se prikazuje sljedeće: */
                 if(isset($_SESSION['user'])){
                     echo "<div class='nav-user-wrapper borderyx'>
                                <span class='nav-account-username bordery'>
                                    <a class='nav-account' href='account.php'>"
                                        . $_SESSION['user'] .
                                    "</a>
                                </span>
                                <span class='nav-account-icon-wrapper bordery'>
                                    <a class='nav-account borderyx' href='account.php'>
                                        <i class='fa fa-user-circle fa-lg nav-account-icon' aria-hidden='true'></i>
                                    </a>
                                </span>
                            </div>";
                 }
              /* ako nisi logiran, onda se prikazuju login i register: */
              else{
                  echo"  <a href='login.php'><button type='button' class='nav-button' >Login</button></a>
                         <a href='register.php'><button type='button' class='nav-button'>Register</button></a>";
              }
            ?>

        </div>
    </div>
</nav>
||||||| .r143
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
           include "connect.php";

              /* ako si logiran, onda se prikazuje sljedeće: */
                 if(isset($_SESSION['user'])){
                     echo "<div class='nav-user-wrapper borderyx'>
                                <span class='nav-account-username bordery'>
                                    <a class='nav-account' href='account.php'>"
                                        . $_SESSION['user'] .
                                    "</a>
                                </span>
                                <span class='nav-account-icon-wrapper bordery'>
                                    <a class='nav-account borderyx' href='account.php'>
                                        <i class='fa fa-user-circle fa-lg nav-account-icon' aria-hidden='true'></i>
                                    </a>
                                </span>
                            </div>";
                 }
              /* ako nisi logiran, onda se prikazuju login i register: */
              else{
                  echo"  <a href='login.php'><button type='button' class='nav-button' >Login</button></a>
                         <a href='register.php'><button type='button' class='nav-button'>Register</button></a>";
              }
            ?>

        </div>
    </div>
</nav>
=======
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
            <li><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>

        <div class="nav-login-container">

           <?php
           include "connect.php";

              /* ako si logiran, onda se prikazuje sljedeće: */
                 if(isset($_SESSION['user'])){
                     echo "<div class='nav-user-wrapper'>
                                <span class='nav-account-username'>
                                    <a class='nav-account' href='account.php'>"
                                        . $_SESSION['user'] .
                                    "</a>
                                </span>
                                <span class='nav-account-icon-wrapper'>
                                    <a class='nav-account' href='account.php'>
                                        <i class='fa fa-user-circle fa-lg nav-account-icon' aria-hidden='true'></i>
                                    </a>
                                </span>
                            </div>";
                 }
              /* ako nisi logiran, onda se prikazuju login i register: */
              else{
                  echo"  <a href='login.php'><button type='button' class='nav-button' >Login</button></a>
                         <a href='register.php'><button type='button' class='nav-button'>Register</button></a>";
              }
            ?>

        </div>
    </div>
</nav>
>>>>>>> .r151
