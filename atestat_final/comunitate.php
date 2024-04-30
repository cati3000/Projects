
<?php
include("conecting_to_database.php");
error_reporting(0);
    session_start();
?>

<!DOCTYPE html>
<html lang="ro">
<head>
     <link rel="icon" href="icon.png" type="image/gif" zise="16x16">
            <title>Comunitate ProTuning Shop</title>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                   <link type="text/css" rel="stylesheet" href="ceseu.css" >
                   <link type="text/css" rel="stylesheet" href="edit_img.css" >
                   <link type="text/css" rel="stylesheet" href="flipcards.css" >

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
        }
        

#alo{
        padding: 14px 16px;
        background-color: transparent;
        color: aquamarine;
        border-color: aquamarine;
        font-size: 17px;
         border-radius: 20px;
        width: 120px;
        font-weight:bold; 
}

        .row {
          display: flex;
        }

        .left {
          flex: 35%;
          padding-right: 20px;
          padding-left: 20px;
            padding-top: 10px;
            
        }

        .left h2 {
          padding-left: 8px;
        }

        .right {
          flex: 65%;
          padding: 15px;
        }

           input[type=text] {
              width: 450px;
              padding: 12px 5px;
/*              margin: 8px 0;*/
              box-sizing: border-box;
              border: 3px solid black;
              border-radius: 8px;
            }
        
        textarea{
            width: 450px;
            height: 36px;
            resize: none;
            border: 3px solid black;
             border-radius: 8px;
       

        }
        #tbl{
            width: 470px;
            border: 1px solid black;
            border-radius: 15px;
            background-color: #1C1C1C;
            padding-top: 10px;
            padding-left: 10px;
            padding-right: 10px;
        }
        
        #alo{
        padding: 14px 16px;
        background-color: transparent;
        color: aquamarine;
        border-color: aquamarine;
        font-size: 17px;
         border-radius: 20px;
        width: 120px;
        font-weight:bold;
              border: 2px solid aliceblue;
            
            }
        #alo:hover{
            background-color: blue;
            border-radius: 20px;
        }
        p{
    margin-top: -20px;
}
        </style>
</head>
<body>
     <?php
    include("topnavigation.php");
    ?>


        <div class="row">
         <div class="left" style="background-image: linear-gradient(to right, darkblue , black); font-family:verdana">
            
             
             <?php
             if ($_SESSION['login']==true )
             {
                  ?>
                <h2 style="color:white">Adauga Comentarii</h2>

              <?php
             }
             else
             {
                 ?>
                <h2 style="color:white;">Conecteaza-te sau Inregistreaza-te pentru a adauga comentarii</h2>
                <?php
             }
             ?>
             
             <form action="" method="post">
                 <table>
                     <?php
                        if ($_SESSION['login']==true )
                        { 
                     ?>
                         <tr> 
<!--                         <td><strong> Comentariu:</strong> <textarea name="comm"></textarea> </td>  -->
                         <td><strong style="color:white"> Comentariu:</strong> <input type="text" name="comm" maxlength="50"> </td>  
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input id="alo"  type="submit" name="posteaza" value="Posteaza" title="Posteaza Comentariul"> <input id="alo" type="reset" name="res" value="Renunta" > </td>
                        </tr>
                     <?php
                         }
                     else
                     {
                         ?>
                         <tr> 
                         <td><strong style="color:white"> Comentariu:</strong> <textarea readonly></textarea> </td>  
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><button id="alo"> Posteaza </button> <button id="alo"> Renunta </button> </td>
                        </tr>
                            <?php
                         
                     }
                     ?>
                      
                 </table>
             </form>
             <br>
             
             <?php
             if(isset($_POST['posteaza']))
             {
                 $comm="";
                 $comm=$_POST['comm'];
                 if(!empty($comm))
                 {
                     $user2=$_SESSION['user'];
                     $sql = "INSERT INTO comentarii (user, comment, data) VALUES ('$user2', '$comm', now())";
                    $result = $conn->query($sql);
                 }
                 
                 
             }                             
//                $sql = "SELECT id, user, comment, data FROM comentarii order by data desc";
                $sql="SELECT a.id, a.user, a.comment, a.data, b.avatar, b.user FROM comentarii as a INNER JOIN conturi as b where b.user=a.user order by data desc";
                $result = $conn->query($sql);
               
                if ($result->num_rows > 0)
                {
                  // output data of each row
                  foreach ($result as $index => $array)
                  {
                       $av="uploads/".$array['avatar'];
                      
                      
                      ?>
                        <center><table id="tbl">   
                            <tr>
                        <td><img src="<?php echo $av?>" style="width:40px; height:40px; float:left; margin-right:5px; border-radius:5px">
                         <b style= "color:white; font-size:20px; float:left; margin-top:8px;">  <?php echo $array["user"];?> </b>
                         <i style="float:right; color:white"><?php echo $array["data"];?></i>
                                 <hr style="border:1px solid white; width:100%; margin-top:50px">
                                <p style="color:white; margin-top:10px"><?php echo  $array["comment"];?> </p>
                         </td></tr></table></center><br>

                <?php 
                  }
                } 
             
             
             ?>
          </div>

          <div class="right" style="    background-color:#1C1C1C;font-family:verdana">
            <h2 style="color: white;" >Bun venit in Comunitatea ProTuning <?php echo"$idd"; ?></h2>
            
              <hr style="border:1px solid white; width:100%;"><br>
             <h3 style="color: white;" >Galerie Foto:</h3>
              
             <div class="flip-card" style="float:left; margin-bottom:30px;">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="e36.jpg" alt="Avatar" style="width:400px;height:250px;">
                </div>
                <div class="flip-card-back">
                    <h1>BMW E36 M3 Coupe</h1>
                  <p>Modificat cu:</p>
                  <p>-Galerie Admisie Din Fibra De Carbon ALPHA</p>
                  <p>-Turbina ProTuning P2 Pro</p>
                  <p>-Set 4 Pistoane Aluminiu 60mm + 4 Biele Titan 131mm</p>
                  
                </div>
              </div>
            </div>
          
               <div class="flip-card" style="float:right; margin-bottom:30px;">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="supra.jpg" alt="Avatar" style="width:400px;height:250px;">
                </div>
                <div class="flip-card-back">
                  <h1>Toyota Supra mk4</h1>
                  <p>Modificat cu:</p>
                  <p>-Intercooler ProTech Z3 60mm</p> 
                  <p>-Turbina ProTuning P2 Pro</p> 
                  <p>-Set 2 Axe Came 820mm ProTuning</p> 
                </div>
              </div>
            </div>
              
              <br>
              
            <br>
              
              <div class="flip-card" style="float:left; margin-bottom:30px;">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="viper-matte.jpg" alt="Avatar" style="width:400px;height:250px;">
                </div>
                <div class="flip-card-back">
                    <h1>Dodge Viper SRT</h1>
                  <p>Modificat cu:</p>
                  <p>-Compresor SuperCharger ProAlpha</p>
                  
                </div>
              </div>
            </div>
          
               <div class="flip-card" style="float:right; margin-bottom:30px;">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="r34.jpg" alt="Avatar" style="width:400px;height:250px;">
                </div>
                <div class="flip-card-back">
                  <h1>Nissan Skyline R34 GT-R</h1>
                  <p>Modificat cu:</p>
                  <p>-Turbina ProTuning P3</p>
                  <p>-Intercooler ProTech Z2 50mm</p>
                  <p>-Kit Protoxid De Azot ProN</p>
                </div>
              </div>
            </div>
              
              <div class="flip-card" style="float:left; margin-bottom:30px;">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="350z.jpg" alt="Avatar" style="width:400px;height:250px;">
                </div>
                <div class="flip-card-back">
                    <h1>Nissan 350Z Custom</h1>
                  <p>Modificat cu:</p>
                  <p>-Turbina Garrett 80mm Cu Rulmenti Ceramici</p>
                  <p>-Set 4 Pistoane Aluminiu 60mm + 4 Biele Titan 131mm</p>
                  <p>-Set 4 Axe Came 790mm Cosworth</p>
                  
                  
                </div>
              </div>
            </div>
          
               <div class="flip-card" style="float:right; margin-bottom:30px;">
              <div class="flip-card-inner">
                <div class="flip-card-front">
                  <img src="e21.jpg" alt="Avatar" style="width:400px;height:250px;">
                </div>
                <div class="flip-card-back">
                  <h1>BMW E21 Drift Build</h1>
                  <p>Modificat cu:</p>
                  <p>-Set 4 Pistoane Aluminiu 60mm + 4 Biele Titan 131mm</p>
                  <p>-Galerie Admisie Din Fibra De Carbon ALPHA</p>
                  <p>-Cutie Viteze Secventiala 5+1</p>
                </div>
              </div>
            </div>
              
              <br>

              <button onclick="topFunction()" id="myBtn" title="Go to top">Du-te sus</button>
               <hr style="border:1px solid white; width:100%;"><br>
             <h3 style="color: white;" >Galerie video:</h3>
              
              <center><table style="color:white;" width="800px">
                  <tr>
                      <td width="530px"><video width="520" height="400" controls>
                        <source src="dyno1.mp4" type="video/mp4"></video></td>
                      <td padding="10px"><h3>Ford Mustang GT</h3>Putere: 503 CP / 470 NM<br>Modificat cu:<br>-Cutie Viteze Secventiala 5+1<br>-Galerie Admisie Din Fibra De Carbon ProV8<br></td>
                  </tr>
                  <tr>
                      <td width="530px"><video width="520" height="400" controls>
                        <source src="dyno2.mp4" type="video/mp4"></video></td>
                      <td padding="10px"><h3>BMW E60 M5</h3>Putere: 590 CP / 670 NM<br>Modificat cu:<br>-Cutie Viteze Secventiala 6+1 MAX Shift<br>-Set 4 Biele Titan 140mm x 40mm<br>-Galerie Evacuare HKS</td>
                  </tr>
                   <tr>
                      <td width="530px"><video width="520" height="400" controls>
                        <source src="dyno3.mp4" type="video/mp4"></video></td>
                      <td padding="10px"><h3>Toyota Supra mk4</h3>Putere: 1350 CP / 819 NM<br>Modificat cu:<br>-Turbina ProTuning P3<br>-Intercooler ProTech Z2 50mm<br>-Set 4 Pistoane Aluminiu 60mm + 4 Biele Titan 131mm<br>-Set 2 Axe Came 820mm ProTuning<br>-Kit Protoxid De Azot ProN</td>
                      
                  </tr>
                  </table></center>
              
            </div></div>        
            
           <?php include("subsol.php") ?>
</body>
</html>
