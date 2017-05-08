<?php
//pocetak sesije koja pamti login
session_start();
//dodavanje .php dokumenta za spajanje s bazom
include 'connect.php';
//prikupljanje podataka iz forme
$username = $_POST['username'];
$password = $_POST['password'];

//testni ispis unesenih podataka u formi
/*echo $username."<br>";
echo $password;*/

//query username i password u bazi
$sql = "SELECT * FROM login WHERE username='$username' and password='$password'";

//mysqli_query(connection,query,resultmode)-  function performs a query against the database.
$result = mysqli_query($conn, $sql);

//The mysqli_fetch_assoc() function fetches a result row as an associative array.
if (!$row=mysqli_fetch_assoc($result)){
echo "Your username or password is incorect";
}
else {
  //uspostavljanje sesije
  $_SESSION['user'] = $row['username'];
// echo ".$username "."you're logged in";
}

header("Location: index.php");
