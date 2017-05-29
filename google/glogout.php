<?php

include_once 'gpConfig.php';

unset($_SESSION['token']);
unset($_SESSION['userData']);

$gClient->revokeToken();

session_destroy();

//prebacivanje na basic page poslije logout
header("Location: ../index.php");
?>