<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>LocationReport</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
    <!-- Script de google maps -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&libraries=&v=weekly&channel=2" type="text/javascript"></script>
    <!-- Script de google maps -->
    <script type="text/javascript" src= "./js/fonctions.js"> </script>




  </head>


  <body onload="init();">

  <svg style="display: none;">
    <symbol id="bootstrap" viewBox="0 0 118 94">
      <title>Bootstrap</title>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M 24.509 0 c -6.733 0 -11.715 5.893 -11.492 12.284 c 0.214 6.14 -0.064 14.092 -2.066 20.577 C 8.943 39.365 5.547 43.485 0 44.014 v 5.972 c 5.547 0.529 8.943 4.649 10.951 11.153 c 2.002 6.485 2.28 14.437 2.066 20.577 C 12.794 88.106 17.776 94 24.51 94 H 93.5 c 6.733 0 11.714 -5.893 11.491 -12.284 c -0.214 -6.14 0.064 -14.092 2.066 -20.577 c 2.009 -6.504 5.396 -10.624 10.943 -11.153 v -5.972 c -5.547 -0.529 -8.934 -4.649 -10.943 -11.153 c -2.002 -6.484 -2.28 -14.437 -2.066 -20.577 C 105.214 5.894 100.233 0 93.5 0 H 24.508 z H 44 z z H 60.91 z M 44 22 V 73 H 80 V 64 H 56 V 22 H 44"></path>
    </symbol>
  </svg>

  <main>
  
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
          <span class="fs-4">LocationReport</span>
        </a>

        <ul class="nav nav-pills">
          <li class="nav-item"><a href="index.html" class="nav-link" aria-current="page">Accueil</a></li>
          <li class="nav-item"><a href="stats.html" class="nav-link ">Stats</a></li>
          <li class="nav-item"><a href="#" class="nav-link active">Clients</a></li>
          <li class="nav-item"><a href="apropos.php" class="nav-link">A propos</a></li>
        </ul>
      </header>
    </div>


  <center>
  <div style="display :flex; flex-basis;">
    <div style="border: solid; margin-left: 500px;" >
    <link rel="stylesheet" media="screen" type="text/css" href="Forms.css"/>

      <strong> Ajouter un client</strong><br /><br /><br />
      <input type="submit" onclick="location.href='form.html';" value="Formulaire" ><br /><br /><br />     
    </div>
   
   
      <div class="supp" style="border: solid; margin-left: 100px; ">
      <link rel="stylesheet" media="screen" type="text/css" href="Forms.css"/>
      <form name="test" method="post" action="commande2.php" >
            <strong> Supprimer un client</strong><br /><br />
            <strong>N° : </strong><input type="text" name="N°"/> <br /><br />
            <input type="submit"  value="Supprimer" value=""/></td>
       </from>
       </div>
       </div>
     </center>   
  

    <div class="b-example-divider">
    <link rel="stylesheet" media="screen" type="text/css" href="Forms.css"/>

           
            <?php

              try
              {
              	$bdd = new PDO('mysql:host=localhost; dbname=locationreport', 'root', '');
              }
              catch (Exception $e)
              {
                      die('Erreur : ' . $e->getMessage());
              }


              $sql = "SELECT * FROM t_clients";
              $result = $bdd->query($sql);
              $result-> setFetchMode(PDO::FETCH_NUM);

              echo "<div class=\"table-responsive\">
                <table class=\"table table-striped table-sm\">
                  <thead>
                     <tr>
                      <th scope=\"col\">N° client</th>
                      <th scope=\"col\">Nom</th>
                      <th scope=\"col\">Prénom</th>
                      <th scope=\"col\">Telephone</th>
                      <th scope=\"col\">Email</th>
                      <th scope=\"col\">Particulier</th>
                      <th scope=\"col\">Adresse</th>
                      <th scope=\"col\">Code postal</th>
                      <th scope=\"col\">Ville</th>
                      <th scope=\"col\">Total d'achat</th>
                      <th scope=\"col\">Pas encore payer</th>
                    </tr>
                  </thead>
                  <tbody>";
              foreach ($result as $row) {
                  echo "<tr>"
                  . "<td>" . $row[0] . "</td>"
                  . "<td>" . $row[1] . "</td>"
                  . "<td>" . $row[2] . "</td>"
                  . "<td>" . $row[3] . "</td>"
                  . "<td>" . $row[4] . "</td>"
                  . "<td>" . $row[5] . "</td>"
                  . "<td>" . $row[6] . "</td>"
                  . "<td>" . $row[7] . "</td>"
                  . "<td>" . $row[8] . "</td>"
                  . "<td>" . $row[9] . "€" . "</td>"
                  . "<td>" . $row[10] . "€" . "</td>"
                  . "</tr>";
              }

            ?>
                </tbody>
              </table>
            </div>

    </div>

  </main>

  </body>

  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">&copy; 2021 Company, Inc</p>

      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="index.html" class="nav-link px-2 text-muted">Accueil</a></li>
        <li class="nav-item"><a href="stats.html" class="nav-link px-2 text-muted">Stats</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Clients</a></li>
        <li class="nav-item"><a href="apropos.php" class="nav-link px-2 text-muted">A propos</a></li>
      </ul>
    </footer>
  </div>


</html>
