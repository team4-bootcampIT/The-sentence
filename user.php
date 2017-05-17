<?php
    include 'header.php';
?>

<?php
    include 'nav.php';
?>



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
