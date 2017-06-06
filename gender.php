<<<<<<< .mine
 <?php
 if(isset($_SESSION['user'])){
$user = mysqli_real_escape_string($conn, $_SESSION['user']);
$user1 = mysqli_real_escape_string($conn, $_SESSION['user']);


// SQL injection protection - ovo je drugi način i bolja zaštita -> prepared statements
$stmt=$conn->prepare( "SELECT * FROM prijava WHERE username=?  OR email=? ");
$stmt->bind_param("ss",$user,$user1);

$user=$user;
$user1=$user1;

$stmt->execute();


$result=$stmt->get_result();

$rowNum=$result->num_rows;
		if($rowNum>0){
				if($row=$result->fetch_assoc())
				{
          $oauth_provider=$row['oauth_provider'];
					$gender=$row['gender'];
}
}
 }
||||||| .r0
=======
 <?php
 if(isset($_SESSION['user'])){
$user = mysqli_real_escape_string($conn, $_SESSION['user']);
$user1 = mysqli_real_escape_string($conn, $_SESSION['user']);


// SQL injection protection - ovo je drugi način i bolja zaštita -> prepared statements
$stmt=$conn->prepare( "SELECT * FROM prijava WHERE username=?  OR email=? ");
$stmt->bind_param("ss",$user,$user1);

$user=$user;
$user1=$user1;

$stmt->execute();


$result=$stmt->get_result();

$rowNum=$result->num_rows;
		if($rowNum>0){
				if($row=$result->fetch_assoc())
				{

					$gender=$row['gender'];
}
}
 }>>>>>>> .r151
