<?php
//pocetak sesije koja pamti login

//dodavanje .php dokumenta za spajanje s bazom


 if(isset($_COOKIE['mbid']) && $_COOKIE['mbto']){

$memberid=mysqli_real_escape_string($conn,$_COOKIE['mbid']);
$memberto=mysqli_real_escape_string($conn,$_COOKIE['mbto']);

$stmt=$conn->prepare( "SELECT * FROM prijava WHERE member_id=? AND member_token=? ");
$stmt->bind_param("ss",$mbid,$mbto);

$mbid=$memberid;
$mbto=$memberto;

$stmt->execute();


$result=$stmt->get_result();

$rowNum=$result->num_rows;
		if($rowNum>0){
				if($row=$result->fetch_assoc())
				{

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
                }


}
}
?>