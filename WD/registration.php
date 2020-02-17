<?php

$db_connection = new mysqli('localhost', 'root', '', 'saw');
		if ($db_connection->connect_error) {
    		die('Errore di connessione (' . $db_connection->connect_errno . ') '
            . $db_connection->connect_error);
		}

  $first_name = $_POST["firstname"];
	$last_name = $_POST["lastname"];
	$matricola = $_POST["matricola"];
	$email = $_POST["email"];
	$password = $_POST["pass"];
	$password_confirm = $_POST["confirm"];



$first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
$first_name = ucfirst($first_name);                                             //ucfirst mette maiuscola la prima lettera

$last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
$last_name= ucfirst($last_name);

$password = password_hash($password, PASSWORD_BCRYPT);
$password_confirm = password_hash($password_confirm, PASSWORD_BCRYPT);

$email = filter_var($email, FILTER_SANITIZE_EMAIL);
  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo("$email non è valida");
		header('refresh:3; url=registrazione.html');
	}



$ctrl_mail = $db_connection->query("SELECT email FROM utenti WHERE email='$email'");         //controllo se la mail non è gia registrata

	 if($ctrl_mail->num_rows>0)
	 {
		 echo "L'email risulta già stata registrata, riprovare.";
		 header('refresh:3; url=registrazione.html');
  }

function insert_user($email, $first_name, $last_name, $password, $password_confirm, $db_connection, $matricola) {

	$query = "INSERT INTO utenti (nome, cognome, matricola, email, password, iscrizione) VALUES ('$first_name', '$last_name', '$matricola', '$email', '$password',NOW())";
			// Esecuzione della query e controllo degli eventuali errori
			if (!$db_connection->query($query)) {
				die($db_connection->error);
			}
	   return true;
		}


$successful = insert_user($email, $first_name, $last_name, $password, $password_confirm, $db_connection, $matricola);

if ($successful) {
    // Success message
    header('location:login.html');
} else {
    // Error message
    echo "There was an error in the registration process.";
}
?>
