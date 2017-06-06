<?php
include "connect.php";

 // $email  = $_REQUEST['email'];

// SQL injection protection - ovo je jedan način ali je slabija zaštita -> mysqli_real_escape_string 
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);



// SQL injection protection - ovo je drugi način i bolja zaštita -> prepared statements
$stmt=$conn->prepare( "SELECT * FROM prijava WHERE  email=? ");
$stmt->bind_param("s",$email);


$email=$email;

$stmt->execute();


$result=$stmt->get_result();

$rowNum=$result->num_rows;
		if($rowNum>0){

        echo 'false';
    }
    else{
        echo 'true';
    }
    exit();
    ?>