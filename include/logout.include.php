<?php

session_start();

setcookie ("mbid", "", time() - 3600, "/");
setcookie ("mbto", "", time() - 3600, "/");

		session_unset();
session_destroy();
	header("Location: ../index.php");
