<<<<<<< .mine
<?php

session_start();

setcookie ("mbid", "", time() - 3600, "/");
setcookie ("mbto", "", time() - 3600, "/");
	setcookie("cap", "", time() - 3600, "/");
		session_unset();
session_destroy();
	header("Location: ../index.php");
	// povezivanje sa fbConfig
	require_once 'socialnetworks/facebook/fbConfig.php';
	// povezivanje sa gpConfig
	include_once 'socialnetworks/google/gpConfig.php';

	// Brisanje tokena iz sesije
	unset($_SESSION['facebook_access_token']);
	unset($_SESSION['token']);

	// Micanje podataka od korisnika iz sesije
	unset($_SESSION['userData']);

	// Vrati na index
	header("Location:index.php");
||||||| .r143
<?php

session_start();

setcookie ("mbid", "", time() - 3600, "/");
setcookie ("mbto", "", time() - 3600, "/");

		session_unset();
session_destroy();
	header("Location: ../index.php");
	// povezivanje sa fbConfig
	require_once 'fbConfig.php';
	// povezivanje sa gpConfig
	include_once 'google/gpConfig.php';

	// Brisanje tokena iz sesije
	unset($_SESSION['facebook_access_token']);
	unset($_SESSION['token']);

	// Micanje podataka od korisnika iz sesije
	unset($_SESSION['userData']);

	// Vrati na index
	header("Location:index.php");
=======
<?php

session_start();

setcookie ("mbid", "", time() - 3600, "/");
setcookie ("mbto", "", time() - 3600, "/");
setcookie ("cap", "", time() - 3600, "/");
		session_unset();
session_destroy();
	header("Location: ../index.php");
	// povezivanje sa fbConfig
	require_once 'fbConfig.php';
	// povezivanje sa gpConfig
	include_once 'google/gpConfig.php';

	// Brisanje tokena iz sesije
	unset($_SESSION['facebook_access_token']);
	unset($_SESSION['token']);

	// Micanje podataka od korisnika iz sesije
	unset($_SESSION['userData']);

	// Vrati na index
	header("Location:index.php");
>>>>>>> .r151
