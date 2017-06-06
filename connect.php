<<<<<<< .mine
<?php
//konektiranje s bazom podataka
$conn = mysqli_connect('localhost','root','','testbaza_facebook');//provjera konekcije
if (!$conn){
  die("Connection failed: " . mysqli_connect_error()); //connection eror - injection hacking! maknuti prije live websajta
};
||||||| .r143
<?php
//konektiranje s bazom podataka
$conn = mysqli_connect('localhost','root','','testbaza_facebook');//provjera konekcije
if (!$conn){
  die("Connection failed: " . mysqli_connect_error()); //connection eror - injection hacking! maknuti prije live websajta
};
=======
<?php
//konektiranje s bazom podataka
$conn = mysqli_connect('localhost','root','1234','prijava');//provjera konekcije
if (!$conn){
  die("Connection failed: " . mysqli_connect_error()); //connection eror - injection hacking! maknuti prije live websajta
};
>>>>>>> .r151
