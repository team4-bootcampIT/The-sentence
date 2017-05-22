<?php
//pocetak sesije koja pamti login
session_start();
//dodavanje .php dokumenta za spajanje s bazom
include '../connect.php';
//prikupljanje podataka iz forme
if(isset($_SESSION['user'])) {
      $user = $_SESSION['user'] ;
       $email = $_SESSION['user'] ;

   }
$password = $_POST['password'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
//testni ispis unesenih podataka u formi
/*echo $username."<br>";
echo $password;*/

//hesiranje lozinke na loginu za provjeru
$sql = "SELECT * FROM prijava WHERE email='$email' OR username='$user' ";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
//hesirana lozinka
$hpwd = $row['password'];
//true or false
$hash = password_verify($password,$hpwd);
//<---- provjeravanje stare lozinke---->
if($hash == 0){

header("Location: ../change.php?error=missmatch1");
    exit ();
}
else{
//<---- provjeravanje da li se ponovno utipkani novi password poklapa --->
		if($password1!=$password2){
 		header("Location: ../change.php?error=missmatch2");
		}


		else{
		//query username i password u bazi
		$sql = "SELECT * FROM prijava WHERE email='$email' OR username='$user' and password='$hpwd'";
		$result = mysqli_query($conn, $sql);

				if (!$row=mysqli_fetch_assoc($result)){
				echo "Your username or password is incorect";
				}
				else {
			//<---- kriptiranje nove lozinke i updateanje u bazi ---->
				$encpass1= password_hash($password1, PASSWORD_DEFAULT);
 				$sql = "UPDATE prijava SET password='$encpass1' WHERE password='$hpwd'";
       		    mysqli_query($conn, $sql);
     		    header("Location: ../change.php?good=changed");

               		 }

			}

	}
