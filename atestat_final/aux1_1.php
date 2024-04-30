<?php
error_reporting(0);
    session_start();
?>

<?php
include("conecting_to_database.php");
        $id_produs=$_GET['record'];
                 $sql = "SELECT denumire, descriere, pret, imagine, stoc, categorie,discount from produse WHERE id_prod='$id_produs'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0 && $row = $result->fetch_assoc())
                {
                        $id_img=$row['imagine'];
                        $descriere=$row['descriere'];
                        $pret =$row['pret'];
                        $name =$row['denumire'];
                        $stoc=$row['stoc'];
                        $categorie=$row['categorie'];
                        $discount=$row['discount'];
                }
?>
<!DOCTYPE html>
<html lang="ro">
<head>
            <link rel="icon" href="icon.png" type="image/gif" zise="16x16">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title><?php echo $name; ?></title>
                   <link type="text/css" rel="stylesheet" href="ceseu.css" >
                   <link type="text/css" rel="stylesheet" href="edit_img.css" >
                   <link type="text/css" rel="stylesheet" href="form_tab.css" >
                   <link type="text/css" rel="stylesheet" href="popup_style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
            <style>
              .fullscreen:-webkit-full-screen {
              width: auto !important;
              height: auto !important;
              margin:auto !important;
          }
             .fullscreen:-moz-full-screen {
              width: auto !important;
              height: auto !important;
              margin:auto !important;
          }
             .fullscreen:-ms-fullscreen { 
              width: auto !important;
              height: auto !important;
              margin:auto !important;
          }     
             </style>
             <script>
                function makeFullScreen() {
                 var divObj = document.getElementById("theImage");
               //Use the specification method before using prefixed versions
              if (divObj.requestFullscreen) {
                divObj.requestFullscreen();
              }
              else if (divObj.msRequestFullscreen) {
                divObj.msRequestFullscreen();               
              }
              else if (divObj.mozRequestFullScreen) {
                divObj.mozRequestFullScreen();      
              }
              else if (divObj.webkitRequestFullscreen) {
                divObj.webkitRequestFullscreen();       
              } else {
                console.log("Fullscreen API is not supported");
              } 

            }
             </script>
   
    <style>
        body {
          font-family: Arial, Helvetica, sans-serif; 
           
        }

        * {
          box-sizing: border-box;
        }
        .row {
          display: flex;
        }
        select{
            width: 100px;
            color: aliceblue;
            background-color: black;
            height: 40px;
            border-radius: 10px;
            font-size: 20px;
            float: left;
            
        }
        
        .left {
          flex: 50%;
          padding: 15px 15px;
        }

        .left h2 {
          padding-left: 8px;
        }
        .right {
          flex: 50%;
          padding: 15px;
        }
        
        #ch{ 
            font-size: 25px;
            color: aliceblue;
            float: right;
            padding: 4px;
            vertical-align: top; 
        }
        .add-to-cart{
            display: table-cell; 
            border-radius:15px;
            background-color:orange; 
            height:60px;
            width:400px;
            vertical-align:top;
            color:black; 
            padding-top:20px;
           
        }
        .add-to-cart:hover{
            background-color:#339bea;
        }
        
        .sim-prod-style{
            text-decoration: none;
            color: white;
        }
        .sim-prod-style:hover{
            color: #339bea;
        }
        </style>
</head>
<body>
         <?php
    include("topnavigation.php");
    ?>
 
        <div class="row">
        <div class="left" style="background-image: linear-gradient(to bottom, darkblue , black);">

            <img id="theImage" style="width:700px; height:700px;"  class="fullscreen" src="<?php echo $id_img?>" onClick="makeFullScreen()">
          </div>
           
          <div class="right" style="background-color:#1A1717;">
              <form action="" method="post" >
              <table id="ped">
                  <tr>
                      <td id="formatare_col_doi"><h1 style="color:white; padding-left:20px;"> <?php echo $name?> </h1>
                      <hr style="border:1px solid white; width:100%;">
                      </td>
                  </tr>
                  <tr>
                      <td id="formatare_col_doi"  padding="10px" >
                          
                          
                          <b id="ch"> in STOC  </b> <b id="ch"> <?php echo $stoc ?> bucati </b>
                      </td>
                  </tr>
                  <tr><td>
                      
                      <?php
                                        if($discount && $stoc)
                                        {
                                            ?>
                                            <h3 style="float:left; background-color:yellow; border-radius:10px; padding:10px;">-<?php echo $discount?>%</h3><br>
                                               <h1 style="float:right;color:white; padding-left:20px;line-height: 2px;   text-decoration: line-through 3px solid red;"> <?php echo $pret; ?> RON</h1><br><br><br>

                                                  <h1 style="color:white; padding-left:20px;float:right;">
                                            <?php
                                                $p=$pret-floor(($pret*$discount)/100); 
                                                echo $p; 
                                            ?> RON</h1>
                                  
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                 <h1 style="color:white; padding-left:20px; float:right "><?php echo $pret ?> RON</h1>
                                            <?php
                                        }
                                      
                                      ?>
                      
                      
                      </td></tr>
                  <tr>
                      <td align="center">
                     <?php
                    if($_SESSION['login'])/// daca sunt logat pot adauga produse in cos
                    {
                        if(!$stoc)///daca stocul e 0 nu va exista posibilitatea de a adauga in cos
                        {
                        ?> 
                            <div class="popup"  onclick="myFunction()">
                            <b class="add-to-cart"> ADAUGA IN COS </b>
                            <span class="popuptext" id="myPopup">Ne pare rau, dar produsul nu este disponibil momentan in stoc</span>
                            </div>
                          <a style="text-decoration:none;"  href="cos.php"><b class="add-to-cart">COS DE CUMPARATURI <i style="font-size:16px" class="fa">&#xf07a;</i> </b></a>
                            <?php
                        }
                        else
                         {
                            ?>
                                    
                            <a style="text-decoration:none;" href= "cos.php?rec=<?php echo $id_produs?>&cat=<?php echo $categorie?>">
                             <b class="add-to-cart"> ADAUGA IN COS </b>
                          </a><br><br>
                            <a style="text-decoration:none;"  href="cos.php"><b class="add-to-cart">COS DE CUMPARATURI <i style="font-size:16px" class="fa">&#xf07a;</i> </b></a>
                            <?php
                        }
                                       
                    }
                    else
                    {
                        ?>
                        <div class="popup"  onclick="myFunction()">
                            <b class="add-to-cart"> ADAUGA IN COS </b>
                            <span class="popuptext" id="myPopup">Pentru a adauga produse in cos trebuie sa va conectati sau sa va autentificati</span>
                        </div><br>
                        <div class="popup"  onclick="myFunction2()">
                            <b class="add-to-cart">COS DE CUMPARATURI <i style="font-size:16px" class="fa">&#xf07a;</i> </b>
                            <span class="popuptext" id="myPopup2">Pentru a accesa  cosul de cumparaturi trebuie sa fiti conectat</span>
                        </div>
                         <?php
                    }
                    ?>
                            
                      </td>
                  </tr>
              </table></form>
          </div>
            
        </div>
        
        <div style="background-color:black; margin-top:-21px; min-height:800px; color:white; padding:17px">
            <h2>Detalii:</h2>
            <table style="width:1320px; height:300px; border:2px solid white; color:white; border-radius:15px">
                <tr>
                    <td style="padding:10px" valign="top"><?php echo $descriere ?></td>
                </tr>
            </table>

            <h2>Produse Similare:</h2>
             <?php
                $id_produs=$_GET['record'];
                 $sql = "SELECT * FROM produse WHERE (categorie='$categorie' and id_prod!='$id_produs')  LIMIT 6";
                $result = $conn->query($sql);
                if ($result->num_rows > 0)
                {
                  while($row = $result->fetch_assoc())
                  {
                      $id_img=$row['imagine'];
                      $denumire_prod=$row['denumire'];
                      $id=$row['id_prod'];
                      ?>
                            
<!--                         <b style="color:white; font-size:20px"><?php// echo $row["denumire"];?> </b><br>-->
                            <table style="float: left">
                                <tr>
                                    <td><img style="width:200px; height:200px" src="<?php echo $id_img?>"></td>
                                </tr>
                                <tr>
                                    <td width="100px"><a style="text-decoration: none;" href="aux1_1.php?record=<?php echo $id?>"><strong class="sim-prod-style"><?php echo $denumire_prod?></strong></a></td>
                                </tr>
                            </table>
                        

                    <?php 
                  }
                } 
            
            
            ?>
            
            </div>
            <script>
            // cand dam click pe layer de va afisa cateta de popup
            function myFunction() {
              var popup = document.getElementById("myPopup");
              popup.classList.toggle("show");
            }
                function myFunction2(){
                     var popup2 = document.getElementById("myPopup2");
              popup2.classList.toggle("show");
                }
            </script>

</body>
</html>
