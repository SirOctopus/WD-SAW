<?php
session_start();

   if (!isset($_SESSION["log"])){

      header ('Location: login.php');
   }
    else {

       $email = $_SESSION["log"];
    }


  $mysqli = new mysqli('localhost', 'root', '', 'saw');
    	if ($mysqli->connect_error) {
        	die('Errore di connessione (' . $mysqli->connect_errno . ') '
          . $mysqli->connect_error);
    		}

  $data = $_POST["date"];
  $email;                       //matricola presa dalla sessione
  $person = $_POST["num_person"];
  $from = $_POST["from"];
  $to = $_POST["to"];

  $query = "INSERT INTO autista (email, passeggeri, partenza, arrivo) VALUES ('$email', '$person', '$from', '$to')";

    if (!$mysqli->query($query)) {
      die($mysqli->error);
      }

    else
      echo "sei stato inserito come autista";

      header('refresh:3; url=show_profile.php');               //in che pagina andare dopo l'inserimento dell'autista?  nella home?

?>
