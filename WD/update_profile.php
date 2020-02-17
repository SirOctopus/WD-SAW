<?php
session_start();

  if (!isset($_SESSION["log"])){

    header ('Location: login.html');
     }
       else {
         $email = $_SESSION["log"];
     }

    $db_connection = new mysqli('localhost', 'root', '', 'saw');
        if ($db_connection->connect_error) {
          	die('Errore di connessione (' . $db_connection->connect_errno . ') '
                . $db_connection->connect_error);
    	}

  $first_name = $_POST["nome"];
  $email;                       //email presa dalla sessione
  $last_name= $_POST["cognome"];
  $matricola = $_POST["matricola"];
  $foto = $POST["foto"];


function update_user($email, $first_name, $last_name, $db_connection, $foto) {

  $query = "UPDATE utenti SET nome = '$first_name', cognome = '$last_name', foto='$foto' WHERE email = '$email'";
    if (!$db_connection->query($query)) {
      die($db_connection->error);
    }
 return true;
}

  $successful = update_user($email, $first_name, $last_name, $db_connection, $foto);

    if ($successful) {
        // Success message
        header("Location: show_profile.php");
        exit();
    } else {
        // Error message
        echo "There was an error in the update process.";
    }


?>
