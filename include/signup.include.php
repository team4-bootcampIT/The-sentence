<?php

include '../connect.php';
include '../header.php';


//dodavanje vrijednosti iz forme za registraciju
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passworda = $_POST['passworda'];


//testni ispis unesenih podataka u formi
/*echo $email."<br>";
echo $username."<br>";
echo $password;*/

//<---- provjeravanje praznih polja na register formi (dodavanje error koda u adresu)---->
if (empty($username)){
    header("Location: ../register.php?error=uempty");
    exit ();
}
if (empty($email)){
    header("Location: ../register.php?error=eempty");
    exit ();
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

//<---- trazimo dal se username vec nalazi u bazi ---->
         $sql = "SELECT * FROM prijava WHERE username='$username' ";
         $result = mysqli_query($conn, $sql);

  //<---- ako nam query s usernameom nije dao rezultata prelazimo na provjeru emaila ---->
                if (!$row=mysqli_fetch_assoc($result)){

                $sql = "SELECT * FROM prijava WHERE email='$email' ";
                $result = mysqli_query($conn, $sql);
                          if (!$row=mysqli_fetch_assoc($result)){
//<---- ako nam query s emailom nije dao rezultata prelazimo na unos podataka u bazu ---->
//<---- prvo stvaramo novu varijablu encpas koja ce nam kriptirati lozinku, te zatim kriptiranu lozinku spremamo u bazu ---->             
                           $encpass= password_hash($password, PASSWORD_DEFAULT); //hesiranje lozinke
                           $sql = "INSERT INTO prijava (username,email,password) VALUES ('$username','$email','$encpass')";
                           $result = mysqli_query($conn, $sql);
//<---- preusmjeravanje na login s kodom uspjesna registracija ---->   
                           header("Location: ../login.php?reg=success");
                           exit();
                           }
//<----  ako nem query nasao username vec u bazi dodajemo error kod za iskoristen email  ---->   
                           else{
                           header("Location: ../register.php?error=exemail");
                           exit();
                           }}
 //<---- ako nem query nasao username vec u bazi dodajemo error kod za iskoristen username ---->         
                else{
                header("Location: ../register.php?error=username");
                exit();
                }
}
