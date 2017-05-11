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


         <?php

      if(isset($_SESSION['user'])){
        echo $_SESSION['user'] ;
        echo " you're logged in";

      }
      else{
         header("Location: login.php?error=notlogged");
        exit ();
      }
       ?>
    </div>

</body>
</html>