<?php

session_start();

setcookie ("mbid", "", time() - 3600, "/");
setcookie ("mbto", "", time() - 3600, "/");

		session_unset();
session_destroy();
	header("Location: ../index.php");
	// povezivanje sa fbConfig
	require_once 'fbConfig.php';

	// Brisanje tokena iz sesije
	unset($_SESSION['facebook_access_token']);

	// Micanje podataka od korisnika iz sesije
	unset($_SESSION['userData']);

	// Vrati na index
	header("Location:index.php");
