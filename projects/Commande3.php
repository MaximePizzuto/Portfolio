<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>LocationReport</title>
  </head>

 <?php
  if (!empty($_POST["Adrtaj"])) {
    echo "Les données de la personne suivante a été supprimé   : <br /> ";
    echo $_POST["Adrtaj"] . "<br />";

    try {
      $conn = new PDO('mysql:host=localhost; dbname=locationreport', 'root', '');
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Demande SQL
      $sql = "INSERT INTO `locationreport`.`t_adresses` (`Adresse`, `Date`)
        VALUES ('" . $_POST["Adrtaj"] . "','" . $_POST["start"] . "')";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "Les informations ont bien était ajoutées";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    
    header("Location: http://127.0.0.1/projects/index.php");


  } else {
      echo "Les données n'ont pas pus être envoyer";
  }
?> 


<!--
<?PHP
 $conn = new PDO('mysql:host=localhoste; dbname=locationreport', 'root', '');
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (!$conn)
  {
  die('connexion impossible' . mysql_error());
  }

       $sql = "DELETE FROM t_clients WHERE N = " . $_POST["N°"];
      $conn->exec($sql);
?> -->








</html>
