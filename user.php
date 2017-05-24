<?php
    include 'header.php';

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

    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="js/script.js"></script>

</body>
</html>