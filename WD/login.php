<!DOCTYPE html>
<html>

<head>

<?php

$db_connection = new mysqli('localhost', 'root', '', 'saw');
		if ($db_connection->connect_error) {
    		die('Errore di connessione (' . $db_connection->connect_errno . ') '
            . $db_connection->connect_error);
		}

	$email = $_POST["email"];
  $pass = $_POST["pass"];

	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
	    echo("$email non è valida");
			header('refresh:3; url=login.html');
		}

$pass = password_hash($pass, PASSWORD_BCRYPT);

		function login($email, $pass, $db_connection) {

			$query = $db_connection->query("SELECT * FROM utenti WHERE email = '$email'");
				if($query->num_rows) {
					while($row = mysqli_fetch_assoc($query)){
						$vpass = $row["password"];
					   if ($pass = $vpass){
						   session_start();
					     $_SESSION["log"] = $email;
						   return true;
            }
					}
			  }
     }


	$user = login($email, $pass, $db_connection);

		if ($user) {
			header('Location: decision.php');
	  }
		else {
        echo "Wrong email or password";
				header('refresh:3; url=login.html');
			  }

?>


 </head>

</html>
