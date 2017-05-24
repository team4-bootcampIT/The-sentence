<?php

include "../connect.php";
include "../header.php";


if(isset($_POST['registerSubmit'])){
 
//dodavanje vrijednosti iz forme za registraciju
$username = mysqli_real_escape_string($conn,$_POST['username']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$passworda = mysqli_real_escape_string($conn,$_POST['passworda']);
$email_code = md5($_POST['username']+rand());
$from="info@the-sentence.ga";
$headers = 'From: '.$from."\r\n".'Reply-To: '.$from."\r\n".'X-Mailer: PHP/' . phpversion();


//testni ispis unesenih podataka u formi
/*echo $email."<br>";
echo $username."<br>";
echo $password;*/

//<---- provjeravanje praznih polja na register formi (dodavanje error koda u adresu)---->
if (empty($username)){
  $error='set';
    header("Location: ../register.php?error=uempty");
    exit ();
}
if (empty($email)){
   $error[] = 'Username provided is already in use.';
    
}

if (empty($password)){
    header("Location: ../register.php?error=pempty");
    exit ();
}
if (empty($passworda)){
    header("Location: ../register.php?error=paempty");
    exit ();
}
//<---- provjeravanje podudaranja dva passworda na formi ---->
    if ($password !== $passworda){
        header("Location: ../register.php?error=pmis");
        exit ();
        }

//<---- ako je sve u redu s ispunjavanjem forme - nastavak na provjeru iskoristenosti usernamea i passworda ---->
    else {
        $stmt = $conn->prepare("SELECT username FROM prijava WHERE username = ?");
        $stmt->bind_param("s",$username);

        $username=$username;
        $stmt->execute();

        $result=$stmt->get_result();

        $rowNum=$result->num_rows;
    
       if($rowNum>0){
        header("Location: ../register.php?error=username");
                exit();

       }
       else
       {

        $stmt = $conn->prepare("SELECT username FROM prijava WHERE email = ?");
        $stmt->bind_param("s",$email);

        $email=$email;
        $stmt->execute();

        $result=$stmt->get_result();
        $rowNum=$result->num_rows;
               
                   if($rowNum>0){
                   header("Location: ../register.php?error=exemail");
                           exit();
                             }
                             else{
                            $encpass= password_hash($password, PASSWORD_DEFAULT);
                            $stmt=$conn->prepare( "INSERT INTO prijava (email,username,password,active,email_code) VALUES (?,?,?,?,?) ");
                            $stmt->bind_param("sssss",$email,$username,$password,$active,$email_code);

                            $username=$username;
                            $email=$email;
                            $password=$encpass;
							$active="No";
              $email_code =$email_code ;
							
                            $stmt->execute();
							$result=$stmt->get_result();
                              mail( $email,'verification','http://the-sentence.ga/activate.php?email='.$email.'&email_code='.$email_code,$headers);
                           header("Location: ../verification.php?reg=success");
                          exit();


                             }


       }
    }


}