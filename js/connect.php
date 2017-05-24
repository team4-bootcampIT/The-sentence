<?php
//konektiranje s bazom podataka
$conn = mysqli_connect('sql204.epizy.com','epiz_20073420','qsp72MIc','epiz_20073420_baza
');
//provjera konekcije
if (!$conn){
  die("Connection failed: " . mysqli_connect_error()); //connection eror - injection hacking! maknuti prije live websajta
};
