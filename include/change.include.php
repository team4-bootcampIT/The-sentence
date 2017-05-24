<?php
//pocetak sesije koja pamti login
session_start();
//dodavanje .php dokumenta za spajanje s bazom
include "../connect.php";
//prikupljanje podataka iz forme
if(isset($_POST['submitChange'])){
	if(isset($_SESSION['user'])){

$email = mysqli_real_escape_string($conn, $_SESSION['user']);
$loguser = mysqli_real_escape_string($conn, $_SESSION['user']);
$uid = mysqli_real_escape_string($conn, $_SESSION['id']);

 }
$password = mysqli_real_escape_string($conn,$_POST['password']);
$password1 = mysqli_real_escape_string($conn,$_POST['password1']);
$password2 = mysqli_real_escape_string($conn,$_POST['password2']);

$stmt=$conn->prepare( "SELECT * FROM prijava WHERE username=? OR email=? ");
$stmt->bind_param("ss",$username,$email);

$username=$loguser;
$email=$loguser;

$stmt->execute();


$result=$stmt->get_result();

$rowNum=$result->num_rows;
		if($rowNum>0){
				if($row=$result->fetch_assoc())
				{
				$hpwd = $row['password'];
				$hash = password_verify($password,$hpwd);

							if($hash == 0){

							header("Location: ../change.php?error=missmatch1");
   							exit ();
							}

							else{
								if($password1!=$password2){
 									header("Location: ../change.php?error=missmatch2");
									}
									else{
										$encpass1= password_hash($password1, PASSWORD_DEFAULT);
										$stmt=$conn->prepare( "UPDATE prijava SET password=? WHERE username=? OR email=? AND id=? ");
										$stmt->bind_param("ssss",$password,$username,$email,$id);

										$password=$encpass1;
										$username=$loguser;
										$email=$loguser;
										$id=$uid;

										$stmt->execute();
										header("Location: ../change.php?good=changed");
										exit();}
							}

						}
			
					}
		else{
		header("Location: ../login.php?error=missmatch");
    	exit ();
   			}
		}