<?php
    session_start();
error_reporting(0);

include("conecting_to_database.php");

        $id=$_GET['rec'];
         $cat=$_GET['cat'];
        $del=$_GET['del'];
        $user=$_SESSION['user'];
        $sql="SELECT id from conturi where user='$user'";
        $rez=$conn->query($sql);
        if ($rez->num_rows > 0 && $row = $rez->fetch_assoc())
        {
            $id_user=$row['id'];
        }
//        echo "$id_user";
        if(!empty($id) )
        {// se pune problema ca la fiecare refresh se readauga produsul selectat in cos; il adaug doar daca nu este deja introdus in cos
            
            $sql="SELECT id_produs, id_user from cos";
            $result=$conn->query($sql);
            $da=false;/// pp ca produsul nu este in cos
            
             if ($result->num_rows > 0)
                {
                  while($row = $result->fetch_assoc())
                  {
                      if($id==$row['id_produs'] && $id_user==$row['id_user'])
                      {
                          $da=true;/// produsul se afla deja in cos
                          break;
                      }
                  }
                } 
            if(!$da)/// daca nu se afla il adaug in cos
            {
                $sql="INSERT INTO cos (id_user, id_produs, cantitate) VALUES('$id_user' ,'$id', '1')";
                $result=$conn->query($sql);
            }
                
        }
        if(!empty($del))/// stergerea produsului pe care dorim sa-l eliminam din cos
        {
//            echo "merge";
             $sql="DELETE from cos WHERE (id_produs='$id' and id_user='$id_user')";
            $result=$conn->query($sql);
            ?>
                <script type="text/javascript">
                     window.location.href = "cos.php";
                </script>
            <?php
        }
        
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <link rel="icon" href="icon.png" type="image/gif" size="16x16">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Cos De Cumparaturi</title>
                   <link type="text/css" rel="stylesheet" href="ceseu.css" >
                    <link type="text/css" rel="stylesheet" href="incerc.css" >
                    <link type="text/css" rel="stylesheet" href="form_tab.css" >
                    <link type="text/css" rel="stylesheet" href="format_imagine.css">

        <style>
        body {
            background-repeat:no-repeat;
            background-size:100% 100%;
            background-attachment: fixed;
        }
        .row {
          display: flex;
        }
        .right {
          flex: 40%;
          padding: 15px;
            padding-top: 30px;
            min-height: 600px;
        }
            .left {
          flex: 60%;
          padding: 14px;
        }
            
        input[type=text] {
              width: 100%;
              padding: 12px 5px;
              margin: 8px 0;
              box-sizing: border-box;
              border: 3px solid black;
              border-radius: 4px;
            }
        input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;
          border: 3px solid black;
          border-radius: 4px;
             }

              #alo{
                padding: 12px 20px;
                background-color: transparent;
                color: aquamarine;
                border-color: aquamarine;
                font-size: 17px;
                 border-radius: 20px;
                font-weight:bold;
                float: right;
                  margin-right: 25px;
            }
         #alo:hover{
            background-color: blue;
             border-radius: 20px;
       
              }
            .link-style{
                padding-left:20px; 
                color:white;
                text-decoration: none;
            }
            .link-style:hover{
                color: #339bea;
            }
            input[type=number]{
                width: auto;
                padding: 9px;
                background-color: transparent;
                border: 2px solid aquamarine;
                border-radius: 15px; 
                color: white;
                
            }
            .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
          background-color: #339bea;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
            color: black;
            border-radius: 20px;
            font-family: verdana;
            
            
        }

        /* The Close Button */
        .close {
          color: #000;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }

        .close:hover,
        .close:focus {
          color: red;
          text-decoration: none;
          cursor: pointer; 
        }
        .butt-style
        {
            background-color: transparent;
            border-style: none;
            color: white;
            font-size: 23px;
            font-weight: bold;
            border: 2px solid transparent;
            border-radius: 12px;
            margin-left: -12px;
            padding: 5px 10px;
        }
        .butt-style:hover{
            color: lightblue;
            background-color: transparent;
            border: 2px solid black;
            border-radius: 12px;
            padding: 5px 10px;
            cursor: pointer;
        }
            
        .table-style
        {
            width:900px; 
            border:1px solid black;
            border-radius: 120px;
        }
        </style>
    
</head>
<body >
        
        <?php
    include("topnavigation.php");
    ?>
            
            
    <div class="row">
        <div class="left" style="background-image: linear-gradient(to right, darkblue , black);">

         
            <br>
            <table border="1px" style="float:left; border:2px solid black; width:650px; background-image:linear-gradient(to right, blue, darkblue)" >
                          <tr style="height:100px">
                              <td width="200px"><center><h3 style="padding:10px; color:white">Imagine Produs</h3></center></td>
                              <td width="300px"> <h3 style="padding:10px; color:white"><center>Denumire produs</center></h3> </td>
                              <td width="150px"> <h3 style="padding:10px; color:white"><center>Pret</center></h3>
                                    
                              </td>
                              
                          </tr>
                         
            <?php
            $sql="select a.denumire, a.imagine, a.id_prod, a.pret, a.discount, a.stoc, a.categorie, b.cantitate from produse as a inner join cos as b where a.id_prod=b.id_produs and  b.id_user='$id_user'";
             $result=$conn->query($sql);
                $price=0;
                $k=0;
            if($_SESSION['login']==true)
            
            foreach ($result as $index => $array)   
             {
                $k++;
                 $id_img=$array['imagine'];
                    $price+= ($array['pret']-floor(($array['pret']*$array['discount'])/100)) *$array['cantitate'];
                 $id=$array['id_prod'];
                 $ctgry=$array['categorie'];
                $s=$array['stoc'];
                $denumire=$array['denumire'];
                $v[$k]=$id;/// retin id-ul celor k elemente din cos
                 ?>
                          <tr>
                                <td width="200px" height="210px"><img style="width:200px; height:200px" src="<?php echo $id_img?>"></td>
                               <td width="300px"> <h3 style="padding-left:20px; color:white">
                                   
                                   <a class="link-style" href="aux1_1.php?record=<?php echo $id?>"><?php echo $denumire; ?></a>
                                   
                                   </h3> </td>
                              <td width="150px"> 
                                  
                                  <a href="cos.php?rec=<?php echo $id?>&del=delete"><center><button id="alo">Sterge</button></center></a>
                                 
                                  <br><br><br>
                                  
                                  <center><strong style="color:white; font-size:25px;"><?php echo $array['pret']-floor(($array['pret']*$array['discount'])/100);?> RON</strong></center>
                                
                              </td>
                              
                          </tr>
              <?php
            }
               
            ?>
                </table>            
            <form method="post" style="float:right">
                  <table border="1px" style="width:80px; background-color:darkblue; border:2px solid black;">
                      <tr  style="height:100px"> <td > <h3 style="padding:6px; color:white"><center>Cantitate Produs</center></h3> </td></tr>
                      
             <?php 
              
            if($_SESSION['login']==true)
            foreach ($result as $index => $array)   
             {
                 $id=$array['id_prod'];
                $s=$array['stoc'];
                 ?>
                          <tr height="213px">
                                
                              <td >
                                  
                                  <center><h2 style="color:white"><?php echo $array['cantitate'] ?></h2></center>
                                  <center><input id class="cantitate" name='<?php echo "cantitate$index"; ?>' min=1 max="<?php echo "$s" ?>" type="number" value=<?php echo $array['cantitate'] ?> /></center><br>

                              </td>
   
                          </tr>
              <?php
            }
              ?>
                      </table>
                <br>
                
                <center><input id="alo" type="submit" value="OK" name="go"></center>
              </form>
  
          </div>

          <div class="right" style="background-color:#1A1717; color:white">
              <?php
              
              $sql="SELECT user, email, adress from conturi where user='$user'";
            $rez=$conn->query($sql);
            if ($rez->num_rows > 0 && $row = $rez->fetch_assoc())
            {
                $name=$row['user'];
                $email=$row['email'];
                $adress=$row['adress'];
            }
            ?>
              
              
              <span><button class="butt-style" id="myButton" title="Click Pentru A Vedea Toate Comenzile Tale">Istoric Comenzi</button></span>

                <!-- The Modal -->
                <div id="myModal" class="modal">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <span class="close" title="EXIT">&times;</span><br><br>
                      
                     
                <?php
                      $sql="select distinct id_comanda, data_comanda, status_comanda from tabela_comenzi where nume_client='$user'";
                      
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0)
                        {
                            ?>
                            <center> <table class="table-style">
                         <tr height="50px">
                             <td style="padding:20px;"><b>ID-ul Comenzii</b></td>
                             <td style="padding:20px;"><b>Data Efectuarii Comenzii</b></td>
                             <td style="padding:20px;"><b>Statusul Comenzii</b></td>
                         </tr>
                            <?php
                            
                              while($row = $result->fetch_assoc())
                              {
                                  echo "<tr  height='50px'>";
                                  $a=$row['id_comanda'];
                                  $b=$row['data_comanda'];
                                  $c=$row['status_comanda'];
//                                  echo "$a $b $c<br>";
                                  ?>
                                <td style="padding:20px;"><?php echo $a?></td>
                                <td style="padding:20px;"><?php echo $b?></td>
                                <td style="padding:20px;"><?php echo $c?></td>
                                <?php
                                  echo "</tr>";

                              }

                                
                        } 
                         else
                         {
                             echo "<center><b>Nu Aveti Momentan Nici O Comanda Pe Site-ul Nostru</b></center>";
                         }
                      
                ?>
                         </table></center>
                      
                  </div>

                </div>
              

              
              <h2>Detalii Comanda</h2>
               <hr style="border:1px solid white; width:100%;">
              <b style="font-size:20px">Nume De Utilizator: </b><i style="font-size:20px"><?php echo $name ?></i><br><br>
              <b style="font-size:20px">Email: </b><i style="font-size:20px"><?php echo $email ?></i><br><br>
              <b style="font-size:20px">Adresa: </b><i style="font-size:20px"><?php echo $adress ?></i><br><br>
              <hr style="border:1px solid white; width:100%;">
              <?php
              
           
             echo "<h2>Pretul total: $price RON</h2>";


               if ($result->num_rows > 0 && !empty($cat))
                {
                    $linc="aux"."$cat".".php";
                    ?>
                        <a id="alo" style="color:white; text-decoration:none; font-size:25px;" href="<?php echo $linc ?>">Continua Cumparaturile >></a>
                    <?php
                }
            else
            {
                 ?>
                        <a id="alo" style="color:white; text-decoration:none; font-size:25px;" href="aux1.php">Vezi Produse >></a>
                    <?php
            }
         
           if(isset($_POST['go']))
           {
                for($i=0; $i<$k; $i++)
                {
                    $a=$_POST["cantitate$i"];/// cantitatea fiecarui produs din cos
                    $id_produs=$v[$i+1];
                    $sql="update cos set cantitate='$a' where id_produs='$id_produs' and id_user='$id_user'";///
                    mysqli_query($conn, $sql);
                } 
               echo "<meta http-equiv='refresh' content='0'>";/// refresh
           }
              echo "<br>";
            if(!$_SESSION['login'])
            {
                ?>
                <script type="text/javascript">
                    window.location.href = "index.php";
              </script>
                <?php
            }
       
            ?>
              <div style="position: fixed; bottom:40px; z-index:99;background-color: transparent; width:460px; height: 50px; margin-left:54px">
                  <br>
                    <form method="post" action="">
                        <input type="submit" value="Trimite Comanda" name="send_order" id="alo" style="width:460px; ">
                    </form>
                </div>
        </div>
        
        
          </div>
        <?php
        if(isset($_POST['send_order']))
        {
            
            $sql="SELECT MAX(id_comanda) FROM tabela_comenzi";/// extrag ultimul id comanda din tabela de comenzi a.i. urm. comanda va avea id_comanda+1
            $rez = $conn->query($sql);
            $id_comanda=0;
            if ($rez->num_rows > 0 && $row = $rez->fetch_assoc())
            {
                $id_comanda=$row['MAX(id_comanda)']+1;
            }
            
            
            $sql="SELECT  a.denumire, a.discount, a.stoc, a.pret, b.cantitate, b.id_produs FROM produse as a inner join cos as b where b.id_user='$id_user' and a.id_prod=b.id_produs";
            $result = $conn->query($sql);
                if ($result->num_rows > 0)
                {
                      while($row = $result->fetch_assoc())
                      {
                            $stoc=$row['stoc'];
                            $id_produs=$row['id_produs'];
                            $cantitate=$row['cantitate'];
                            $nume_produs=$row['denumire'];
                          
                            $discount=$row['discount'];  
                            $pret=$row['pret'];
                            $pret=($pret-floor(($pret*$discount)/100))*$cantitate;
                          
                            $stoc=$stoc-$cantitate;
                            $add="insert into tabela_comenzi (id_comanda, nume_client, nume_produs, cantitate, pret, data_comanda, status_comanda) VALUES ('$id_comanda', '$user', '$nume_produs', '$cantitate', '$pret', now(), 'INREGISTRATA')";/// mut produsele din cos in tabela ce retine comenzile
                            mysqli_query($conn, $add);
                            $pret=0;
                            $update="UPDATE produse set stoc='$stoc' where id_prod='$id_produs'";
                            mysqli_query($conn, $update);
                                
                      }
                    $add="insert into tabela_comenzi (id_comanda, nume_client, nume_produs, cantitate, pret, data_comanda, status_comanda) VALUES ('$id_comanda', ' ', 'TOTAL RAMBURS ->', '0', '$price', now(), 'INREGISTRATA')";
                    mysqli_query($conn, $add);
                    
                    $delete="delete from cos where id_user='$id_user'";/// dupa mutarea celor k produse din cos sterg cele k produse din cos ale userului curent conectat;
                    mysqli_query($conn, $delete);
//                    echo "<meta http-equiv='refresh' content='0'>";/// refresh
                    ?>
                    <script type="text/javascript">
                         window.location.href = "cos.php?rec=<?php echo $id_produs?>&del=delete";
                 </script>
                    <?php
                } 
            
        } 
        
    ?>

        <script>
                                    
            const cantitateInputs = document.getElementsByClassName("cantitate");
            console.log(cantitateInputs)
            for(let i = 0; i < cantitateInputs.length; i++) {
                cantitateInputs[i].addEventListener("change", (e) => console.log(e.target.value));
            }                         
        </script>
        <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myButton");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
</script>
    </body>
</html>
