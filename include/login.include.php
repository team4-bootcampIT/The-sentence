<?php
//pocetak sesije koja pamti login
session_start();
//dodavanje .php dokumenta za spajanje s bazom
include "../connect.php";
include "../captcha.php";
if(isset($_COOKIE['cap'])){
	$l_count=1;
}
if($login_count>0 || $_count>0){
$captcha;

       if(isset($_POST['g-recaptcha-response'])){

         $captcha=$_POST['g-recaptcha-response'];

       }

       if(!$captcha){

        header ("Location: ../login.php?error=missmatc2");

         exit();

       }

       $secretKey = "6LfM4CMUAAAAAP-yjkiaO-kd7Fahm9t35FZtawZz";

       $ip = $_SERVER['REMOTE_ADDR'];

       $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);

       $responseKeys = json_decode($response,true);


}
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
							include "../capt.php";
							header("Location: ../login.php?error=missmatch1");
   							exit ();
							}

							else{
								include "../capt1.php";

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

							setcookie("cap", "", time() - 3600, "/");
							setcookie("mbid", $member_id, time() + (86400 * 30), "/"); // 86400 = 1 day
							setcookie("mbto", $member_token, time() + (86400 * 30), "/");
							$_SESSION['id']= $row['id'];
							$_SESSION['user']= $row['username'];


							} // 86400 = 1 day


else{
								setcookie("cap", "", time() - 3600, "/");
							$_SESSION['id']= $row['id'];
							$_SESSION['user']= $row['username'];

}

							header("Location: ../user.php?");
							exit();
							}

						}

					}
		else{

		setcookie("cap", "cap", time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: ../login.php?error=missmatch");
    	exit ();
   			}
		}
