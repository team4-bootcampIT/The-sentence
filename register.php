<?php

/* include 'connect.php';   */
include 'header.php';
include "nav.php";

?>






    <main>
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
              <div class="input-wrapper1">
                  <div class="icon-wrapper1">
                      <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                  </div>
                  <input   type="text" class="input-login" name="username" placeholder="Username" autofocus>

              </div>


              <div class="input-wrapper1">

                  <div class="icon-wrapper1">
                      <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>
                  </div>

                      <input  type="email" class="input-login" name="email" placeholder="Email"
                       autofocus>

              </div>

              <div class="input-wrapper1">
                  <div class="icon-wrapper1">
                      <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                  </div>
                  <input  id="password" type="password" class="input-login" name="password" placeholder="Password">
              </div>

              <div class="input-wrapper1">
                  <div class="icon-wrapper1">
                      <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                  </div>
                  <input  type="password" class="input-login" name="passworda" placeholder="Repeat password">
              </div>

              <button name="registerSubmit" type="submit" id="submit-button">Create account</button>
          </form>
      </div>
    </main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script>

$(document).ready(function(){

     $("#form-container").validate({
    rules :{
        username : {
            required : true,
            minlength: 4,
             remote: {
                        url: "checkUser.php",
                        type: "post"
                     },
        },
        email : {
            required : true,
             remote: {
                        url: "checkEmail.php",
                        type: "post"
                     },

        },
        password : {
            required : true,
            minlength: 4,
        },
          passworda : {
            required : true,
            equalTo: "#password",
            minlength: 4,
        },
    },
    messages :{
        username : {
            required : 'Please enter username',
remote: "Username already in use!"
        },
        email : {
            required : 'Please enter email',

                     remote: "Email already in use!"
        },
        password : {
            required : 'Please enter password',
            minlength: 'Too weak min 5char',
        },
           passworda : {
             required : 'Please retype password',
            equalTo:'Password do not match',
        },
    },
errorElement:'div',
errorPlacement: function(error,element){

  error.addClass('poruke');
  error.insertAfter(element);
}

      });

});


</script>


<?php
    include 'footer.php';
?>
