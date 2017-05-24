<?php

include "header.php";
include "connect.php";
include "nav.php";

 ?>




<div id="login-container">

<?php

if(isset($_SESSION['user'])){
        echo $_SESSION['user'] ;
        echo " you're already logged in!";
exit();

      }
      else{


$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$email = $_GET['email'];
$email_code = $_GET['email_code'];

//SQL injection protection - prepared statements
$stmt=$conn->prepare( "SELECT * FROM prijava WHERE email=? AND email_code=? AND active=?");
$stmt->bind_param("ssi",$email,$email_code,$active);

$email=$email;
$email_code=$email_code;
$active=0;
$stmt->execute();


$result=$stmt->get_result();

$rowNum=$result->num_rows;
    if($rowNum>0){
        if($row=$result->fetch_assoc())
        {
        $rid = $row['id'];
       $stmt=$conn->prepare( "UPDATE prijava SET active=? WHERE id=?");
       $stmt->bind_param("ii",$active,$id);

$id=$rid;
$active=1;
$stmt->execute();

$result=$stmt->get_result();

              header("Location: login.php?good=act");
              exit();
              }




    else{
    header("Location: login.php?error=act");
      exit ();
        }
    }
     }
