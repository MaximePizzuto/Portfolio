<?php
              try
              {
              	$bdd = new PDO('mysql:host=localhost; dbname=locationreport', 'root', '');
              }
              catch (Exception $e)
              {
                      die('Erreur : ' . $e->getMessage());
              }


              $sql = "SELECT * FROM t_adresses";
              $result = $bdd->query($sql);
              $result-> setFetchMode(PDO::FETCH_NUM);


              foreach ($result as $row) {
                  echo "<tr>"
                  . "<td>" . $row[0] . "</td>"
                  . "<td>" . $row[1] . "</td>"
                  . "</tr>";
              }
 
              ?>
 