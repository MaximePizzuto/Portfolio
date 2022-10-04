<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>LocationReport</title>
  </head>

<?php

     

  if (!empty($_POST["name"])) {
    echo "Les données ont bien étaient envoyés : <br /> ";

    try {
      $conn = new PDO('mysql:host=localhost; dbname=locationreport', 'root', '');
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // Demande SQL
      $sql =
      "INSERT INTO `locationreport`.`t_clients` (`N`, `Nom`, `Prenom`, `Telephone`, `Email`, `Particulier`, `Adresse`, `CP`, `Ville`, `Montant_Achat`, `Total_Achats`, `Reste_a_Payer`)
      VALUES (NULL, '" . $_POST["name"] . "','" . $_POST["prenom"] . "', '" . $_POST["telephone"] . "', '" . $_POST["email"] . "', '" . $_POST["particulier"] . "', '" . $_POST["address"] . "', '" . $_POST["zip"] . "', '".$_POST["Ville"] ."', '', '', '')";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "New record created successfully";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;




  } else {
      echo "Les données n'ont pas plus être envoyer";
  }

  header('Location: newclients.php');
  exit();

 ?>
</html>
