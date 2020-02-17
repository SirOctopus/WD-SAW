<?php
session_start();
?>
<!DOCTYPE html>
<html>
 <head>

  <meta charset="UTF-8">
 	<title>DECISION</title>
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.css">
 	<link rel="stylesheet" href="stile.css">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto&display=swap" rel="stylesheet">

 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


<?php

if (!isset($_SESSION["log"])){
  echo "NON SEI LOGGATO";
  header ('Location: login.php');
  exit;
}

?>
</head>

<body>

   <section class="container">
  	<div class="container_filter"></div>
 		<div class="container_caption">
 			<div class="container_caption_copy">
 				<h1>E tu che lezione hai?</h1>
 				<p>se arrivi in ritardo, almeno <br> ci arrivi in compagnia</p>
        <a href="autista.php" id="aut" class="button">Offro un passaggio</a>
        <a href="passeggero.php" id="pass" class="button">Cerco un passaggio</a>
      </div>
 	</section>

 </body>

</html>
