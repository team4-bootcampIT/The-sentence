<?php
//include 'connect.php';
// stvaranje klase korisnik u koje ukucavam login informacije za bazu i ime tablice di ce se podaci pohranjivati
class User {
	private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "1234";
    private $dbName     = "dbaza";
	private $userTbl    = 'prijava';

	function __construct(){
		if(!isset($this->db)){
            // Spajanje sa bazom
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
	}

	function checkUser($userData = array()){
		if(!empty($userData)){
			// Provjera dali je korisnik vec u bazi
			$prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
			$prevResult = $this->db->query($prevQuery);
			if($prevResult->num_rows > 0){
				// Update podataka  u bazi "vazno za datume  i tokene"
				$query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."',username = '".$userData['first_name']."',password='$2y$10$3ShY3d693ca0qOZHyXjoBOC0a1LM.pjWgrpV7GxxuU.jTjUzRhpdK',active='1', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
				$update = $this->db->query($query);
			}else{
				// Dodavanje novih ako neki fale
				$query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', username = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";
				$insert = $this->db->query($query);
			}
			// Povlacenje podataka iz baze
			$result = $this->db->query($prevQuery);
			$userData = $result->fetch_assoc();
		}

		// Vracanje podataka iz baze za koristenje daljno
		return $userData;
	}
}
?>
