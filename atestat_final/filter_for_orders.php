<?php
                if(isset($_POST['case1']))
              {
                    
                        
                    echo "<center><h2>COMENZI INREGISTRATE</h2></center>";
                  $sql="SELECT DISTINCT id_comanda FROM tabela_comenzi where status_comanda='INREGISTRATA'";      
                  $result=$conn->query($sql);
                  if ($result->num_rows > 0)
                  {
                      $i=0;
                      while($row = $result->fetch_assoc())
                      {
                          $v[$i]=$row['id_comanda'];
                          $i++;
                      }
                      for($j=0; $j<$i; $j++)
                      {
//                           echo " $v[$j] ";
                            $sql="select id_comanda, nume_client, pret, nume_produs, cantitate, data_comanda, status_comanda from tabela_comenzi where id_comanda='$v[$j]'";
                        $result = $conn->query($sql);


                         echo "<center><table class='table-style1'  cellspacing='0px'>";
                          echo "<tr style='height:100px'>";
                          ?>
                      <td><center><h3>Produs</h3></center></td>
                      <td><center><h3>Cantitate</h3></center></td>
                      <td><center><h3>Pret</h3></center></td>
                      <?php
                          echo "</tr>";
                        if ($result->num_rows > 0)
                        {

                           

                          while($row = $result->fetch_assoc()  )
                          {
                            if($row['nume_produs']!="TOTAL RAMBURS ->")
                            {
                              echo "<tr style='height:100px'>";
                               $user=$row['nume_client'];
                                $prod=$row['nume_produs'];
                                $cantitate=$row['cantitate'];
                                $pret=$row['pret'];
                                $date=$row['data_comanda'];
                                $status=$row['status_comanda'];
                              ?>
        <!--                    <td><center><?php echo $user?></center></td>-->
                            <td><center><?php echo $prod?></center></td>
                            <td><center><?php echo $cantitate?></center></td>
                            <td><center><?php echo $pret?></center></td>
        <!--                    <td><center><?php echo $date?></center></td>-->




                            <?php 
                                   echo "</tr>";
                            }
                              else
                                  $total=$row['pret'];
                          }
                        } 


                          $sql="select user, adress, email, pers from conturi where user='$user'";
                          $result=$conn->query($sql);

                        if ($result->num_rows > 0 && $row = $result->fetch_assoc())
                        {
                            $name=$row['user'];
                            $email=$row['email'];
                            $adress=$row['adress'];
                            $pers=$row['pers'];
                        }
                          echo "<tr style='height:300px; vertical-align:top'><td colspan='3' style='padding:15px;'>";

                      ?>
                      <h2>Detalii Factura</h2>
                      <b>ID-ul Comenzii: <?php echo $v[$j] ?></b><br><br>
                      <b>Numele de Utilizator al destinatarului:</b> <?php echo $user ?><br><br>
                      <b>Adresa de Livrare:</b> <?php echo $adress ?>
                       <h2>Alte Detalii legate de User</h2>
                      <b>Email-ul Destinatarului: </b> <?php echo $email ?><br><br>
                      <?php echo $pers ?><br><br>
                      <h2>Status Comanda: <?php echo $status?></h2>
                      <span style="float:right"><h2>Total Ramburs: <?php  echo $total?> RON</h2></span>
                      <?php
                          echo "</td></tr>";

                      echo "</table></center><br><br>";  
                      }
                          
                  }
                    

              }

            if(isset($_POST['case2']))
              {
                 echo "<center><h2>COMENZI IN CURS DE LIVRARE</h2></center>";
                  $sql="SELECT DISTINCT id_comanda FROM tabela_comenzi where status_comanda='IN CURS DE LIVRARE'";      
                  $result=$conn->query($sql);
                  if ($result->num_rows > 0)
                  {
                      $i=0;
                      while($row = $result->fetch_assoc())
                      {
                          $v[$i]=$row['id_comanda'];
                          $i++;
                      }
                      for($j=0; $j<$i; $j++)
                      {
//                           echo " $v[$j] ";
                            $sql="select id_comanda, nume_client, pret, nume_produs, cantitate, data_comanda, status_comanda from tabela_comenzi where id_comanda='$v[$j]'";
                        $result = $conn->query($sql);


                         echo "<center><table class='table-style1'  cellspacing='0px'>";
                          echo "<tr style='height:100px'>";
                          ?>
                      <td><center><h3>Produs</h3></center></td>
                      <td><center><h3>Cantitate</h3></center></td>
                      <td><center><h3>Pret</h3></center></td>
                      <?php
                          echo "</tr>";
                        if ($result->num_rows > 0)
                        {

                           

                          while($row = $result->fetch_assoc()  )
                          {
                            if($row['nume_produs']!="TOTAL RAMBURS ->")
                            {
                              echo "<tr style='height:100px'>";
                               $user=$row['nume_client'];
                                $prod=$row['nume_produs'];
                                $cantitate=$row['cantitate'];
                                $pret=$row['pret'];
                                $date=$row['data_comanda'];
                                $status=$row['status_comanda'];
                              ?>
        <!--                    <td><center><?php echo $user?></center></td>-->
                            <td><center><?php echo $prod?></center></td>
                            <td><center><?php echo $cantitate?></center></td>
                            <td><center><?php echo $pret?></center></td>
        <!--                    <td><center><?php echo $date?></center></td>-->




                            <?php 
                                   echo "</tr>";
                            }
                              else
                                  $total=$row['pret'];
                          }
                        } 


                          $sql="select user, adress, email, pers from conturi where user='$user'";
                          $result=$conn->query($sql);

                        if ($result->num_rows > 0 && $row = $result->fetch_assoc())
                        {
                            $name=$row['user'];
                            $email=$row['email'];
                            $adress=$row['adress'];
                            $pers=$row['pers'];
                        }
                          echo "<tr style='height:300px; vertical-align:top'><td colspan='3' style='padding:15px;'>";

                      ?>
                      <h2>Detalii Factura</h2>
                      <b>ID-ul Comenzii: <?php echo $v[$j] ?></b><br><br>
                      <b>Numele de Utilizator al destinatarului:</b> <?php echo $user ?><br><br>
                      <b>Adresa de Livrare:</b> <?php echo $adress ?>
                       <h2>Alte Detalii legate de User</h2>
                      <b>Email-ul Destinatarului: </b> <?php echo $email ?><br><br>
                      <?php echo $pers ?><br><br>
                      <h2>Status Comanda: <?php echo $status?></h2>
                      <span style="float:right"><h2>Total Ramburs: <?php  echo $total?> RON</h2></span>
                      <?php
                          echo "</td></tr>";

                      echo "</table></center><br><br>";  
                      }
                          
                  }

              }

            if(isset($_POST['case3']))
              {
                     echo "<center><h2>COMENZI LIVRATE</h2></center>";
                  $sql="SELECT DISTINCT id_comanda FROM tabela_comenzi where status_comanda='LIVRATA'";      
                  $result=$conn->query($sql);
                  if ($result->num_rows > 0)
                  {
                      $i=0;
                      while($row = $result->fetch_assoc())
                      {
                          $v[$i]=$row['id_comanda'];
                          $i++;
                      }
                      for($j=0; $j<$i; $j++)
                      {
//                           echo " $v[$j] ";
                            $sql="select id_comanda, nume_client, pret, nume_produs, cantitate, data_comanda, status_comanda from tabela_comenzi where id_comanda='$v[$j]'";
                        $result = $conn->query($sql);


                         echo "<center><table class='table-style1'  cellspacing='0px'>";
                          echo "<tr style='height:100px'>";
                          ?>
                      <td><center><h3>Produs</h3></center></td>
                      <td><center><h3>Cantitate</h3></center></td>
                      <td><center><h3>Pret</h3></center></td>
                      <?php
                          echo "</tr>";
                        if ($result->num_rows > 0)
                        {

                           

                          while($row = $result->fetch_assoc()  )
                          {
                            if($row['nume_produs']!="TOTAL RAMBURS ->")
                            {
                              echo "<tr style='height:100px'>";
                               $user=$row['nume_client'];
                                $prod=$row['nume_produs'];
                                $cantitate=$row['cantitate'];
                                $pret=$row['pret'];
                                $date=$row['data_comanda'];
                                $status=$row['status_comanda'];
                              ?>
        <!--                    <td><center><?php echo $user?></center></td>-->
                            <td><center><?php echo $prod?></center></td>
                            <td><center><?php echo $cantitate?></center></td>
                            <td><center><?php echo $pret?></center></td>
        <!--                    <td><center><?php echo $date?></center></td>-->




                            <?php 
                                   echo "</tr>";
                            }
                              else
                                  $total=$row['pret'];
                          }
                        } 


                          $sql="select user, adress, email, pers from conturi where user='$user'";
                          $result=$conn->query($sql);

                        if ($result->num_rows > 0 && $row = $result->fetch_assoc())
                        {
                            $name=$row['user'];
                            $email=$row['email'];
                            $adress=$row['adress'];
                            $pers=$row['pers'];
                        }
                          echo "<tr style='height:300px; vertical-align:top'><td colspan='3' style='padding:15px;'>";

                      ?>
                      <h2>Detalii Factura</h2>
                      <b>ID-ul Comenzii: <?php echo $v[$j] ?></b><br><br>
                      <b>Numele de Utilizator al destinatarului:</b> <?php echo $user ?><br><br>
                      <b>Adresa de Livrare:</b> <?php echo $adress ?>
                       <h2>Alte Detalii legate de User</h2>
                      <b>Email-ul Destinatarului: </b> <?php echo $email ?><br><br>
                      <?php echo $pers ?><br><br>
                      <h2>Status Comanda: <?php echo $status?></h2>
                      <span style="float:right"><h2>Total Ramburs: <?php  echo $total?> RON</h2></span>
                      <?php
                          echo "</td></tr>";

                      echo "</table></center><br><br>";  
                      }
                          
                  }

              }
?>
