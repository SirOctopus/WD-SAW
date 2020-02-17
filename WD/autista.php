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

    $mysqli = new mysqli('localhost', 'root', '', 'saw');
    		if ($mysqli->connect_error) {
        		die('Errore di connessione (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    		}
?>

<body>

<div class="box">

  <h2>Autista</h2>

  <hr>

  <form class="form" action="checkautista.php" method="post">

    <div class="text-box">
      <h1>Dove vai?</h1>
      <input type="text" list="from" name="from" placeholder="Partenza da" required><br>
        <datalist id="from">
         <option value="Stazione Principe">
         <option value="Stazione Brignole">
         <option value="Pzz De Ferrari">
        </datalist>
      <input type="text" list="to" name="to" placeholder="Arrivo a" required><br>
        <datalist id="to">
         <option value="Dipartimento di Fisica">
         <option value="Dipartimento di Economia">
         <option value="Albergo dei poveri">
        </datalist>
    </div>
    <hr>
    <div class="date-person">
      <input type="date" id="date" name="date" value="2020-01-24" required>
      <input type="number" id="num-person" name="num_person" min="1" max="4" step="1" value="1">passeggero
    </div>
    <hr>
    <div class="radio-button">
      <input type="radio" name="veicolo" placeholder="auto" checked><i class="material-icons">directions_car</i>
      <input type="radio" name="veicolo" placeholder="moto"><i class="material-icons">motorcycle</i>
    </div>
      <input type="submit" name="vai" value="vai!">

  </form>

</div>  <!-- box -->

<div class="footer">

   <ul id="menu">
     <li class="active"><a href="autista.php"><i class="material-icons">add_circle_outline</i></a></li>
     <li><a href="passeggero.php"><i class="material-icons">search</i></a></li>
     <li><a href="allresult.php"><i class="material-icons">import_contacts</i></a></li>
     <li><a href="#"><i class="material-icons">chat</i></a></li>
     <li><a href="show_profile.php"><i class="material-icons">perm_identity</i></a></li>
   </ul>

</div>   <!-- footer -->


<script>

// Vede se sono corretti gli input di partenza e arrivo

var inputs = document.querySelectorAll('input[list]');
for (var i = 0; i < inputs.length; i++) {
// Quando il valore del campo cambia...
inputs[i].addEventListener('change', function() {
var optionFound = false,
datalist = this.list;
// Determina se esiste un'opzione con il valore corrente del campo di input.
for (var j = 0; j < datalist.options.length; j++) {
if (this.value == datalist.options[j].value) {
optionFound = true;
break;
}
}
if (optionFound) {
this.setCustomValidity('');
} else {
this.setCustomValidity('Inserire un ');
}
});
}

</script>


</body>

</html>
