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
