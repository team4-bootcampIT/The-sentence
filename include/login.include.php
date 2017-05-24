<?php
//pocetak sesije koja pamti login
session_start();
//dodavanje .php dokumenta za spajanje s bazom
include "../connect.php";

//prikupljanje podataka iz forme
if(isset($_POST['loginSubmit'])){

//SQL injection protection - ovo je jedan način ali je slabija zaštita -> mysqli_real_escape_string
$email = mysqli_real_escape_string($conn, $_POST['loguser']);
$loguser = mysqli_real_escape_string($conn, $_POST['loguser']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$active=1;
$remember = $_POST['remember'];


// SQL injection protection - ovo je drugi način i bolja zaštita -> prepared statements
$stmt=$conn->prepare( "SELECT * FROM prijava WHERE username=? AND active=? OR email=? AND active=? ");
$stmt->bind_param("sisi",$username,$active,$email,$active);

$username=$loguser;
$email=$loguser;
$active=$active;

$stmt->execute();


$result=$stmt->get_result();

$rowNum=$result->num_rows;
		if($rowNum>0){
				if($row=$result->fetch_assoc())
				{
				$hpwd = $row['password'];
				$hash = password_verify($password,$hpwd);

							if($hash == 0){

							header("Location: ../login.php?error=missmatch1");
   							exit ();
							}

							else{
								
					if($remember == 'true'){	

							

	                        $member_id= bin2hex(openssl_random_pseudo_bytes(16)); //128-bit
							$member_token= bin2hex(openssl_random_pseudo_bytes(16)); //128-bit
							$rrid=$row['id'];


							$stmt=$conn->prepare( "UPDATE prijava SET member_id=?, member_token=?  WHERE id=? ");
                            $stmt->bind_param("sss",$member_id,$member_token,$id);

                            $member_id=$member_id;
                            $member_token=$member_token;
							$id=$rrid;

                            $stmt->execute();
							$result=$stmt->get_result();

							setcookie("mbid", $member_id, time() + (86400 * 30), "/"); // 86400 = 1 day
							setcookie("mbto", $member_token, time() + (86400 * 30), "/");
							$_SESSION['id']= $row['id'];
							$_SESSION['user']= $row['username'];

							
							} // 86400 = 1 day
							

else{
								
							$_SESSION['id']= $row['id'];
							$_SESSION['user']= $row['username'];

}

							header("Location: ../user.php?");
							exit();
							}

						}
			
					}
		else{
		header("Location: ../login.php?error=missmatch");
    	exit ();
   			}
		}