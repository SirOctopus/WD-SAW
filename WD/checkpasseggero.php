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
$email;                       //email presa dalla sessione
$person = $_POST["num_person"];
$from = $_POST["from"];
$to = $_POST["to"];

$query = "SELECT * FROM autista WHERE data = $data && num_passeggeri <= $person && partenza = $from && arrivo = $to";
  if($result = mysqli_query($mysqli, $query)){
    if(mysqli_num_rows($result) > 0){
      echo "<table>";
      echo "<tr>";
      echo "<th>data</th>";
      echo "<th>passeggeri</th>";
      echo "<th>from</th>";
      echo "<th>to</th>";
      echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['num_person'] . "</td>";
            echo "<td>" . $row['from'] . "</td>";
            echo "<td>" . $row['to'] . "</td>";
            echo "</tr>";
          }
          echo "</table>";
              // Close result set
          mysqli_free_result($result);
          } else{
              echo "Non sono state trovate corrispondenze col tuo viaggio";
              header('refresh:5; url=decision.php');
              echo  "<a href=\"decision.php\">qui</a>.";
          }
        } else{
          echo "ERROR: Could not able to execute $query. " . mysqli_error($mysqli);
        }

?>
