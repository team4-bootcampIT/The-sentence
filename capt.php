<<<<<<< .mine
<?php
include "connect.php";

if(isset($_POST['loginSubmit'])){

//SQL injection protection - ovo je jedan način ali je slabija zaštita -> mysqli_real_escape_string
$email = mysqli_real_escape_string($conn, $_POST['loguser']);
$loguser = mysqli_real_escape_string($conn, $_POST['loguser']);
$active=1;



// SQL injection protection - ovo je drugi način i bolja zaštita -> prepared statements
$stmt=$conn->prepare( "SELECT * FROM prijava WHERE username=?  OR email=? ");
$stmt->bind_param("ss",$username,$email);

$username=$loguser;
$email=$loguser;


$stmt->execute();


$result=$stmt->get_result();

$rowNum=$result->num_rows;
		if($rowNum>0){
				if($row=$result->fetch_assoc())
				{
				

							

	                  
							$rrid=$row['id'];
							$logi=$row['login_count'];
							$loginc=$logi+1;

							$stmt=$conn->prepare( "UPDATE prijava SET login_count=? WHERE id=? ");
                            $stmt->bind_param("is",$loginc,$id);
							
							$loginc=$loginc;
							$id=$rrid;

                            $stmt->execute();
							$result=$stmt->get_result();
							
							} // 86400 = 1 day
							

}}
else{

	exit();
}||||||| .r0
=======
<?php
include "connect.php";

if(isset($_POST['loginSubmit'])){

//SQL injection protection - ovo je jedan način ali je slabija zaštita -> mysqli_real_escape_string
$email = mysqli_real_escape_string($conn, $_POST['loguser']);
$loguser = mysqli_real_escape_string($conn, $_POST['loguser']);
$active=1;



// SQL injection protection - ovo je drugi način i bolja zaštita -> prepared statements
$stmt=$conn->prepare( "SELECT * FROM prijava WHERE username=?  OR email=? ");
$stmt->bind_param("ss",$username,$email);

$username=$loguser;
$email=$loguser;


$stmt->execute();


$result=$stmt->get_result();

$rowNum=$result->num_rows;
		if($rowNum>0){
				if($row=$result->fetch_assoc())
				{
				

							

	                  
							$rrid=$row['id'];
							$logi=$row['login_count'];
							$loginc=$logi+1;

							$stmt=$conn->prepare( "UPDATE prijava SET login_count=? WHERE id=? ");
                            $stmt->bind_param("is",$loginc,$id);
							
							$loginc=$loginc;
							$id=$rrid;

                            $stmt->execute();
							$result=$stmt->get_result();
							
							} // 86400 = 1 day
							

}}
else{

	exit();
}>>>>>>> .r151
