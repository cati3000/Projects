<?php
error_reporting(0);
    session_start();
        
            include("conecting_to_database.php");
     
            if($_SESSION['login']==true)
            {
                $user=$_SESSION['user'];
                $sql = "SELECT user, email, adress, pers, avatar from conturi WHERE user='$user'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0 && $row = $result->fetch_assoc())
                {
                    $av= "uploads/".$row['avatar'];
                    $name=$row['user'];
                    $email=$row['email'];
                    $adress=$row['adress'];
                    $pers=$row['pers'];
                }
            }
            
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
                   <link type="text/css" rel="stylesheet" href="main_style.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
     #myMenu li a:hover {
              background-color: #339bea;
              color: black;
              width: auto;
              border: 2px solid #339bea;
              border-radius: 15px;
              padding: 10px;
              margin: 2px;
                font-family: "Times new Roman", serif;
                font-weight: bold;
            } 
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
            margin-left: 2px;
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
        
           .alo{
            padding: 14px 14px;
            color: aquamarine;
            background-color: transparent;
             border-color: black;
            font-size: 17px;
             border-radius: 20px;
             width: auto;
            font-weight:bold;
        }
            .alo:hover{
            background-color: lightblue;
            border-radius: 20px;
            border-color: black;
            color: black;
        }
        input[type=file] {
            background-color:  aliceblue;
            border-radius:0px 7px 7px 0px;
        }
       
            </style>
</head>
<body>
    
    <?php
    include("topnavigation.php");
    ?>

        <div class="row">
         <?php include ("search.php") ?> <!-- left layer-->

          <div class="right" style="    background-color:#1C1C1C;">
            <h2 style="font-family:verdana; color: white; padding-left:30px" >Welcome 
                
                <span><button class="butt-style" id="myButton" title="Click Pentru A Vedea Detaliile Contului"><?php echo $user ?></button></span>

                <!-- The Modal -->
                <div id="myModal" class="modal">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <span class="close" title="EXIT">&times;</span><br><br>
                      
                     <center> <table style="font-family:'times new roman'; border:2px solid black; border-radius:10px" width="1000px" cellpadding="10px">
                          <tr>
                        <td rowspan="4"><img style="width:400px; height:400px; border-radius:10px" src="<?php echo "$av"?>"></td>
                              <td width="600px"><i class="fa fa-fw fa-user"></i> Nume De Utilizator: <br><hr style="border:1px solid black; width:100%;"> <i> <?php echo " $user"; ?></i> </td>
                      </tr>
                          
                      <tr>
                          <td  ><i class="fa fa-fw fa-envelope"></i> Email: <br><hr style="border:1px solid black; width:100%;"><i><?php  echo " $email"; ?></i></td>
                      </tr>

                      <tr>
                          <td ><i class="fa fa-globe"></i> Adresa: <br><hr style="border:1px solid black; width:100%;"><i> <?php echo "$adress" ?></i></td>
                      </tr>
                          
                      <tr>
                          <td ><hr style="border:1px solid black; width:100%;"><i> <?php echo "$pers" ?> </i></td>
                      </tr>
                         </table></center><br>
                      
                      <form action="" method="post" enctype="multipart/form-data">
                            Schimbati-va Avatarul:<br>
                            <input type="file" name="file"><br><br>
                          <center><input style="width:400px" class="alo" type="submit" name="submit" value="Schimba Avatar"></center>
                              </form>
                      <center><?php include("upload.php") ?></center>
                  </div>

                </div>

              </h2>
              <center><table border="0px" bordercolor="black" width="800px" height="500px">
                  <tr height="300px">
                      <td width="400px" style=" color:white; text-align: justify; padding:10px; font-family:verdana"> Tuningul auto este modificarea unei mașini pentru a o optimiza pentru un set diferit de cerințe de performanță față de cele pe care a fost conceput inițial să le îndeplinească. Cel mai frecvent, aceasta este o performanță mai mare a motorului și caracteristici de manevrare dinamică, dar mașinile pot fi, de asemenea, modificate pentru a oferi o economie de combustibil mai bună sau un răspuns mai lin. Scopul atunci când reglați este îmbunătățirea performanței generale a unui vehicul ca răspuns la nevoile utilizatorului. De multe ori, reglarea se face în detrimentul performanței emisiilor, fiabilității componentelor și confortului ocupanților.</td>
                      <td style="color:white; text-align:center; "> <img id="prom" src="e362.jpg" > <strong title="SUGUS PELEUS">BMW E36 M3 Coupe</strong>  </td>
                  </tr>
                  <tr>
                      <td colspan="2" style="color:white; text-align: justify; padding:10px; font-family:verdana"  >Pe măsură ce o cultură a crescut în jurul mașinilor modificate, termenul de tuning a crescut pentru a cuprinde schimbările cosmetice și stilistice pe care proprietarii le fac pentru a-și personaliza vehiculele. Aceste modificări pot varia de la modificări funcționale concepute pentru a îmbunătăți performanța sau funcționalitatea mașinii, la modificări vizuale care modifică estetica mașinii și, în cazul anumitor moduri, uneori sunt în detrimentul performanței sau funcționalității mașinii.</td>
                  </tr>
                  
                 <tr>
                     <td style="color:white; text-align:center; "><img id="prom" src="supra.jpg" > <strong>Toyota Supra mk4</strong></td>
                      <td style="color:white; text-align: justify; padding-left:10px; padding:10px; font-family:verdana" > Esența modificării unei mașini tuner este o încercare de a crește semnificativ performanța - sau apariția performanței ridicate - de la un autovehicul de stoc prin adăugarea, modificarea sau înlocuirea directă a pieselor. Deși acest lucru implică în mare parte modificarea motorului și a sistemelor de gestionare ale vehiculului pentru a crește puterea, deseori sunt necesare modificări suplimentare pentru a permite vehiculului să gestioneze o astfel de putere, inclusiv suspensie rigidizată, anvelope lărgite, frâne mai bune și modificări îmbunătățite ale direcției și transmisiei ca instalarea unui schimbator scurt). Deși în mare măsură nesemnificative în ceea ce privește aspectul, anumite modificări, cum ar fi anvelopele cu profil redus, suspensia modificată și adăugarea spoilerelor pot schimba aspectul general al mașinii, precum și adăugarea forței de forță pentru a crește tracțiunea. </td>
                  </tr>
                   <tr>
                      <td colspan="2" style="color:white; text-align: justify; padding:10px; font-family:verdana" >Reglarea motorului este procesul de modificare a caracteristicilor de funcționare ale unui motor. Într-o configurare tipică a motorului, există diferite elemente mecanice și electronice, cum ar fi galeria de admisie, bujiile și fluxul de aer masic. Motoarele moderne folosesc o unitate de control a motorului pentru a oferi cel mai bun echilibru între performanță și emisii. Prin intermediul protocolului de comunicații OBD, aspectele controlate electronic ale motorului pot fi modificate într-un proces cunoscut sub numele de mapare. Cartarea poate fi realizată fie prin schimbarea software-ului în cadrul ECU (reglarea cipurilor prin modificarea firmware-ului), fie prin furnizarea de date false prin hardware plug-in. Sunt disponibile alte sisteme de gestionare a motorului independente; aceste sisteme înlocuiesc computerul din fabrică cu unul care poate fi programat de utilizator.</td>
                  </tr>
                  </table></center>
              
              <br>
              



              
            </div></div>        
            
           <?php include("subsol.php")?>
            
        <script>
        function myFunction() {
          var input, filter, ul, li, a, i;
          input = document.getElementById("mySearch");
          filter = input.value.toUpperCase();
          ul = document.getElementById("myMenu");
          li = ul.getElementsByTagName("li");
          for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
            } else {
              li[i].style.display = "none";
            }
          }
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
