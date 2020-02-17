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

    $query = $db_connection->query("SELECT * FROM utenti WHERE email = '$email'");

      if ($query->num_rows) {
          while($row = mysqli_fetch_assoc($query)) {
           $first_name = $row["nome"];
           $last_name = $row["cognome"];
           $email = $row["email"];
           $foto = $row["foto"];
           $auto = $row["auto"];
           $iscrizione = $row["iscrizione"];
         }
       }
   ?>


<body>

<div class="box">

   <h2>Profilo</h2>

   <hr>

 <div class="modifica">

   <a href="profilo.php"><button type="button" class='active' name="profilo">Profilo</button></a>
   <a href="modifica.php"><button type="button" name="modifica">Modifica</button></a>

</div>


  <div class="foto">

       <img src="<?php echo $foto;?>" onerror="this.src='nofoto.jpg'" alt="profilo">   <br>        <!-- mettere foto di default -->

   </div>

      <h3><?php echo $first_name ." ". $last_name; ?></h3>

  <p>

    <?php echo $email; ?> <br><br>
    0 passaggi dati <br><br>
    0 passaggi presi <br><br>
    dal <?php echo $iscrizione; ?>

  </p>

   <br>

    <h4><a href="ricerca.php">Cerca utenti</a></h4>



</div>     <!-- box -->

<div class="footer">

   <ul id="menu">
     <li><a href="autista.php"><i class="material-icons">add_circle_outline</i></a></li>
     <li><a href="passeggero.php"><i class="material-icons">search</i></a></li>
     <li><a href="allresult.php"><i class="material-icons">import_contacts</i></a></li>
     <li><a href="#"><i class="material-icons">chat</i></a></li>
     <li class="active"><a href="show_profile.php"><i class="material-icons">perm_identity</i></a></li>
   </ul>

</div>   <!-- footer -->


</body>
</html>
