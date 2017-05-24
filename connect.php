<?php
//konektiranje s bazom podataka
$conn = mysqli_connect('localhost','root','1234','dbaza');//provjera konekcije
if (!$conn){
  die("Connection failed: " . mysqli_connect_error()); //connection eror - injection hacking! maknuti prije live websajta
};
