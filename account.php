<?php
    include 'header.php';
    include 'nav.php';
     include "gender.php";
?>


<main>
    <div id="login-container">
        <a href='include/logout.include.php'>
            <button type='button' class='account-button'>Logout</button>
        </a>
        <?php


          if($oauth_provider==""){echo"
          <a href='change.php'>


             <button type='button' class='account-button'>Change password</button>
          </a>";}

         ?>
    </div>

</main>


 <?php
    include 'footer.php';
 ?>
