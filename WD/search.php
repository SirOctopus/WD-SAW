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

    header ('Location: login.php');
     }
       else {
         $email = $_SESSION["log"];
     }

    $db_connection = new mysqli('localhost', 'root', '', 'saw');
        if ($db_connection->connect_error) {
          	die('Errore di connessione (' . $db_connection->connect_errno . ') '
                . $db_connection->connect_error);
    	}

?>

<body>

  <div class="header">

     <h1><a href="passeggero.php" id="back"><i class="material-icons">arrow_back_ios</i></a>Utenti</h1>

  </div>

  <div class="box">

<?php


$search = $_GET["search"];
$search = filter_var($search, FILTER_SANITIZE_STRING);

$Listerror = '<li id="itemris"><strong>Mi spiace non ho trovato risultati.. prova con altre parole!</strong></li>';

function search($search, $db_connection) {
global $Listerror;
  $search = '%'.$search.'%';
  $sql = "SELECT `nome`,`cognome` FROM `utenti` WHERE `nome` LIKE '$search'";
  $stmt = $db_connection->prepare($sql);

  $stmt->execute();
  $result = $stmt->get_result();
  //query($sql)

  $res = array();
  if ($result->num_rows > 0) {
    //$row = $result->fetch_assoc();
    while($row = $result->fetch_assoc()) {
      $res[] = $row;
      //echo "obj = ". $res['NewsLetterObject'];
      //echo "text = ". $res['NewsLetterText'];
      //array_push($res, $row['']);
      //return $res;
    }

  }else {
    $res[] = ['error'=>$Listerror];
    //echo 'trovato nessun risultato!';//array_push($res,['error'=>"<li>Mi spiace non ho trovato risultati.. prova con altre parole!</li>"]);
  }
  return $res;
}

// Search on database
$results = search($search, $db_connection);
if ($results) {
  foreach ($results as $result) {
     // Format as you like and print search results
    if (!array_key_exists("error",$result))
      echo '<p><strong>'.$result['nome']. " " . $result['cognome'].'</strong></p>';
    else
      echo $result['error'];
  }
} else {
  // No matches found
  echo $Listerror;
}
?>

</div>
</body>
</html>
