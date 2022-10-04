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
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback" type="text/javascript"></script>

    <!-- AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback   PROF
        https://maps.google.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&libraries=&v=weekly&channel=2
        AUR :  AIzaSyDtQzrAXuu8LJZbEJIxgBaaw2sdgKuipy8   -->
    <!-- Script de google maps -->
    <script type="text/javascript" src="./js/fonctions.js"></script>
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
          <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Accueil</a></li>
          <li class="nav-item"><a href="stats.html" class="nav-link">Stats</a></li>
          <li class="nav-item"><a href="newclients.php" class="nav-link">Clients</a></li>
          <li class="nav-item"><a href="apropos.php" class="nav-link">A propos</a></li>
        </ul>
      </header>
    </div>

    <div class="b-example-divider">



      <div>
        <center>
          <br>
          <td rowspan="2">
            <b>Transport: </b>
            <select id="mode" onchange="calcRoute();">
              <option value="DRIVING">Voiture</option>
              <option value="WALKING">Marche</option>
              <option value="BICYCLING">V&eacute;lo</option>
            </select><br> <br>


            <b>Latitude: </b>
            <input type="text" id="latitude" value="" style="width:110px;">
            <b>Longitude:  </b>
            <input type="text" id="longitude" value="" style="width:110px;">
            <input type="button" value="  Position  " onclick="trouver()">





           <br> <br>
          Départ
          <input type="text" id="adrDep" value="" style="width:300px;">
          <input type="button" value="Recherche" onclick="rechercher('adrDep',true)">

          Arrivée
          <input type="text" id="adrArr" value="" style="width:300px;">
            <input type="button" value="    Calcul !  " onclick="rechercher2('adrDep','adrArr')">

        </center>
      </div>
      <div id="floating-panel">
  			<input type="button" value="Reset Position" id="test" />
  		</div>
      <div id="divMap" style="float:left;width:70%; height:75%"></div>
      <div id="divRoute" style="float:left;width:30%;height:75%;border:solid"></div>
      <br />
      </div>
      <br />
      <br />
      

      <div id="divtraj" style="float:left;width:50%;height:50%;border:solid">

          <b><center> TRAJETS </center></b>
          <br /><br />
          <form name="test" method="post" action="Commande3.php" novalidate>

          <b>Adresse : </b>
          <input type="text" id="Adrtaj" name="Adrtaj" value="Adresse" style="width:180px;">
          <input type="submit" value=" Ajouter Adresse ">
          <br />
          <b>Date : </b>
          <input type="date" id="start" name="start" name="trip-start" value="2018-07-22"min="1999-01-01" max="2050-12-31">
          <br />
          </form>


          <table width="100%" border="1" cellspacing="1" cellpadding="5">
              <thead>
                  <tr>
                      <th colspan="2">RECAP TRAJETS </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>

                     <!-- <td> ADRESSES 1 </td>
                      <td contenteditable="true">Exampte Label</td> -->
                      <br /><br />

                  </tr>
                  
                   <?php 
                      include("Adressescalc.php"); 
                    ?>




              </tbody>
          </table>




          <br /><br />

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
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Accueil</a></li>
        <li class="nav-item"><a href="stats.html" class="nav-link px-2 text-muted">Stats</a></li>
        <li class="nav-item"><a href="newclients.php" class="nav-link px-2 text-muted">Clients</a></li>
        <li class="nav-item"><a href="apropos.php" class="nav-link px-2 text-muted">A propos</a></li>
      </ul>
    </footer>
  </div>


</html>
