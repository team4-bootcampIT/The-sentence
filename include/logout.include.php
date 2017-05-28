<?php

session_start();

setcookie ("mbid", "", time() - 3600, "/");
setcookie ("mbto", "", time() - 3600, "/");

		session_unset();
session_destroy();
	header("Location: ../index.php");
	// Include FB config file
	require_once 'fbConfig.php';

	// Remove access token from session
	unset($_SESSION['facebook_access_token']);

	// Remove user data from session
	unset($_SESSION['userData']);

	// Redirect to the homepage
	header("Location:index.php");
