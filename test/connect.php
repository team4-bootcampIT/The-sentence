<?php
//konektiranje s bazom podataka
$conn = mysqli_connect('localhost','u189740761_user','25111991','u189740761_baza');
//provjera konekcije
if (!$conn){
  die("Connection failed: " . mysqli_connect_error()); //connection eror - injection hacking! maknuti prije live websajta
};
