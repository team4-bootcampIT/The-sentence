<?php
include "connect.php";

 // $username  = $_REQUEST['username'];

 $username = mysqli_real_escape_string($conn, $_REQUEST['username']);




$stmt=$conn->prepare( "SELECT * FROM prijava WHERE  username=? ");
$stmt->bind_param("s",$username);


$username=$username;

$stmt->execute();


$result=$stmt->get_result();

$rowNum=$result->num_rows;
		if($rowNum>0){

        echo 'false';
    }
    else{
        echo 'true';
    }  exit();
    ?>