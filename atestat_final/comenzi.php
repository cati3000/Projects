<?php
error_reporting(0);
    session_start();
        
            include("conecting_to_database.php");
     

?>
<!DOCTYPE html>
<html lang="ro">
<head>
     <link rel="icon" href="icon.png" type="image/gif" zise="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>ProTuning Shop</title>
                   <link type="text/css" rel="stylesheet" href="ceseu.css" >
                   <link type="text/css" rel="stylesheet" href="edit_img.css" >
                   <link type="text/css" rel="stylesheet" href="slid.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
     
            .topnav a {
              float: left;
              color: #f2f2f2;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
              font-size: 15px;
                margin-right: 2px;
            }
            .topnav a:hover {
              background-color: transparent;
              background-color: #339bea;
              color: black;
              width: auto;
              border: 2px solid #339bea;
              border-radius: 15px;
              padding:5px;
              margin: 2px;
                margin-top: 8px;
              margin-right: 10px;    
                margin-left: 10px;
                text-align: center;
                font-family:verdana;
            }
            .topnav a.active:hover {
            background-color: black;
            width: auto;
            color: white;
            border-radius: 15px;
            border: 2px solid black;
        }
        
        
        
        .butt-style:hover{
            color: lightblue;
            background-color: transparent;
            border: 2px solid black;
            border-radius: 12px;
            padding: 5px 10px;
        }
        
           .alo{
            padding: 10px 10px;
            color: aquamarine;
            background-color: darkblue;
             border-color: white;
            font-size: 13px;
             border-radius: 20px;
             width: auto;
            font-weight:bold;
               margin-bottom: 10px;
               width: 100%;
               font-family: verdana;
        }
            .alo:hover{
            background-color: #339bea;
            border-radius: 20px;
            border-color: black;
            color: black;
        }
        input[type=file] {
            background-color:  aliceblue;
            border-radius:0px 7px 7px 0px;
        }
        * {
          box-sizing: border-box; 
        }

        .row {
          display: flex;
        }

          
        .left {
          flex: 15%;
          padding: 15px;
            color: lightgray;
            font-family: verdana;
            min-height: 1000px;
        }

        /* continut */
        .right {
          flex: 85%;
          padding: 15px;
            color: lightgray;
             font-family: verdana;
        }
        .table-style
        {
            width:150px; 
            border:1px solid white;
            border-radius: 20px;
        }
        .table-style1
        {
            width:1050px; 
            border:1px solid white;
            border-radius: 20px;
        }
        .f-button
        {
            width: 100%;
            margin:10px 0px 10px 0px;
            padding: 15px;
            background-color: #339bea;
            border: 1px solid black;
            border-radius: 13px;
            font-weight: bold;
            font-size: 20px;
            font-family: verdana;
            cursor: pointer;
        }
        .f-button:hover{
            background-color: orange;
        }
        .hvr{
            color:  white;
            text-decoration: none;
        }
        .hvr:hover{
            color: #339bea;
        }
            </style>
</head>
<body>
    
    <?php
    include("topnavigation.php");
    ?>

        <div class="row">
         <div class="left" style="background-image: linear-gradient(to right, darkblue , black);">
             
             <h4>Filtre</h4>
             
             <form method="post" action="">
             <input type="submit" value="INREGISTRATE" name="case1" class="alo">
             <input type="submit" value="IN CURS DE LIVRARE" name="case2" class="alo">
             <input type="submit" value="COMENZI LIVRATE" name="case3" class="alo">
             </form><br>
             
             <h2>ID-ul Comenzilor Nefinalizate</h2>
             <?php
             $sql="select distinct id_comanda from tabela_comenzi where status_comanda!='LIVRATA'";
            $result = $conn->query($sql);
             echo "<center><table class='table-style'> ";
            foreach ($result as $index => $array)   
            {
                echo "<tr style='height:100px'><td>";
                $p=$array['id_comanda'];
                ?>
<!--                <center><h2><?php echo $p?></h2></center>-->
             <center><h2><a class="hvr" href="comenzi.php?send=<?php echo $p?>"><?php echo $p?></a></h2></center>
                <?php
                echo "</td></tr>";
            }
             echo "</table></center>";
             ?>
             
        </div>

          <div class="right" style="    background-color:#1C1C1C;">
              
              <?php
              if(isset($_GET['send']) && $_GET['send']!="nan")
              {
                  
                  $id=$_GET['send'];
                  echo "<h2>Detaliile Comenzii Cu ID-ul $id</h2>";
                    
                  
                  
                  $sql="select id_comanda, nume_client, pret, nume_produs, cantitate, data_comanda, status_comanda from tabela_comenzi where id_comanda='$id'";
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
              <b>ID-ul Comenzii: <?php echo $id ?></b><br><br>
              <b>Numele de Utilizator al destinatarului:</b> <?php echo $user ?><br><br>
              <b>Adresa de Livrare:</b> <?php echo $adress ?>
               <h2>Alte Detalii legate de User</h2>
              <b>Email-ul Destinatarului: </b> <?php echo $email ?><br><br>
              <?php echo $pers ?><br><br>
              <h2>Status Comanda: <?php echo $status?></h2>
              <span style="float:right"><h2>Total Ramburs: <?php  echo $total?> RON</h2></span>
              <?php
                  echo "</td></tr>";
              
              echo "</table></center>";  
                  ?>
               <center><form method="post" action="">
                 <table width="1050px;">
                     <?php 
                     if($status=="INREGISTRATA")
                         echo "<tr><td><input type='submit' name='send_to_shipping' value='Trimite Comanda Firmei de Curierat' class='f-button'></td></tr>";
                    else
                      echo "<tr><td><input type='submit' name='delivered' value='Confirma Livrarea Comenzii' class='f-button'></td></tr>";
                     ?>
                     
                         
                      
                   </table>
                   </form></center>
                
              <?php
                  if($_POST['send_to_shipping'])
                  {
                      $sql="UPDATE tabela_comenzi set status_comanda='IN CURS DE LIVRARE' WHERE id_comanda='$id'";
                      mysqli_query($conn, $sql);
                      echo "<meta http-equiv='refresh' content='0'>";
                  }
                  if($_POST['delivered'])
                  {
                      $sql="UPDATE tabela_comenzi set status_comanda='LIVRATA' WHERE id_comanda='$id'";
                      mysqli_query($conn, $sql);
                      echo "<meta http-equiv='refresh' content='0'>";
                  }
                  
              }
               include ("filter_for_orders.php");
                  
              if(!$_SESSION['login'])
            {
                ?>
                <script type="text/javascript">
                    window.location.href = "index.php";
              </script>
                <?php
            }
              
              
              
              
              ?>
              
            </div>
    </div>        
            
            
        


</body>
</html>
