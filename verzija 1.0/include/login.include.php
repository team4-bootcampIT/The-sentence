<?php
//pocetak sesije koja pamti login
session_start();
//dodavanje .php dokumenta za spajanje s bazom
include '../connect.php';
//prikupljanje podataka iz forme
$loguser = $_POST['loguser'];
$email = $_POST['loguser'];
$password = $_POST['password'];
$userl=md5('username'+rand());

//testni ispis unesenih podataka u formi
/*echo $username."<br>";
echo $password;*/

//hesiranje lozinke na loginu za provjeru
$sql = "SELECT * FROM prijava WHERE email='$email' OR username='$loguser' ";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
//hesirana lozinka
$hpwd = $row['password'];
//true or false 
$hash = password_verify($password,$hpwd);

if($hash == 0){

header("Location: ../login.php?error=missmatch");
    exit ();
}
else{

//query username ili email i password u bazi
		$sql = "SELECT * FROM prijava WHERE email='$email' OR username='$loguser' and password='$hpwd'";
		$result = mysqli_query($conn, $sql);

				if (!$row=mysqli_fetch_assoc($result)){
				echo "Your username or password is incorect";
				}
				else {
				//uspostavljanje sesije
 				 $_SESSION['user'] = $row['username'];
				// echo ".$username "."you're logged in";
				}

header("Location: ../user.php?".$userl);
}


