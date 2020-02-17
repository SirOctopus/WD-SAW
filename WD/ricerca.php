<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="UTF-8">
    <title>AUTISTA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.css">
    <link rel="stylesheet" href="stile.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 minimum-scale=1">

  </head>

<?php

  if (!isset($_SESSION["log"])){

    header ('Location: login.html');
     }
       else {
         $email = $_SESSION["log"];
     }

    $mysqli = new mysqli('localhost', 'root', '', 'saw');
        if ($mysqli->connect_error) {
          	die('Errore di connessione (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    	}

  ?>

<body>

  <div class="header">

     <h1><a href="show_profile.php" id="back"><i class="material-icons">arrow_back_ios</i></a>Ricerca utenti</h1>

  </div>

  <div class="box">

  <form action="search.php" method="GET">

    <input type="text" name="search" placeholder="Ricerca">
    <input type="submit" value="Submit">

  </form>

 </div>

 <div class="footer">

    <ul id="menu">
      <li><a href="autista.php"><i class="material-icons">add_circle_outline</i></a></li>
      <li><a href="passeggero.php"><i class="material-icons">search</i></a></li>
      <li class="active"><a href="result.php"><i class="material-icons">import_contacts</i></a></li>
      <li><a href="#"><i class="material-icons">chat</i></a></li>
      <li><a href="show_profile.php"><i class="material-icons">perm_identity</i></a></li>
    </ul>

 </div>   <!-- footer -->

</body>

</html>
