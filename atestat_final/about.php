<?php
error_reporting(0);
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
     <link rel="icon" href="icon.png" type="image/gif" zise="16x16">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title> Despre ProTuning Shop</title>
                   <link type="text/css" rel="stylesheet" href="ceseu.css" >
                   <link type="text/css" rel="stylesheet" href="edit_img.css" >

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
          flex: 40%;
          padding: 20px;
          
        }

        .left h2 {
          padding-left: 10px;
        }

        .right {
          flex: 60%;
          padding: 20px;
        }
        strong{
            color: lightgray;
        }
        li{
            padding: 5px;
        }
           
        
        </style>
</head>
<body>
     <?php
    include("topnavigation.php");
    ?>


        <div class="row">
         <div class="left" style="background-image: linear-gradient(to right, darkblue , black); font-family:verdana">
            <h2 style="text-decoration: underline; color:lightgrey">Contact:</h2>
             <strong>Email-ul nostru: </strong><i style="color:white"><b>protunigshoponline@gmail.com</b></i><br><br>
             <strong>Numarul nostru de telefon: </strong><i style="color:white"><b>0747474747</b></i><br><br>
             <strong>Program comenzi telefonice: </strong><i style="color:white"><b>Luni - Sambata: 10:00 - 18:00</b></i><br><br>
             <strong>Magazinul nostru fizic: </strong><i style="color:white"><b>Strada Motilor, Titan Est 3 langa Solomon Bando Bussin, nr 47, Campeni, Alba</b></i>
              <hr style="border:1px solid white; width:100%; margin-top:20px;">
            <h2 style=" color:lightgrey">MADE WITH:</h2>
             <ul style="list-style:none; color: lightblue; font-weight:bold;">
                <li>HTML</li>
                <li>CSS</li>
                <li>PHP</li>
                <li>JavaScript</li>
                <li>Beer & Tears :)))</li>
             </ul>
             <h2 style=" color:lightgrey">BY:</h2>
            <ul style="list-style:none; color: lightblue; font-weight:bold">
                <li title="CAPU` STRAZII">Dragoi Andrei Catalin</li>
                <li title="COLTU` MESEI">Gligor Catalin Andrei</li>
             </ul>
             
             
             
          </div>

          <div class="right" style="    background-color:#1C1C1C; font-family:verdana">
            <h2 style="color: white; text-decoration: underline;" >Despre noi:</h2>
              <center><table>
                  <tr><td > <p style="color:white; text-align: justify; padding-left:10px;"> ProTuning-Shop reprezinta imperiul romanesc al pieselor de schimb de cea mai inalta performanta pentru tuning-ul auto cu o experienta de mai bine de 50 de ani in acest domeniu. Produsele noastre, confectionate din aliaje de ultima generatie si cu cele mai bine tenhologii la momentul actual, iti ofera garantia in ceea ce priveste cresterea puterii motorului. </p> </td></tr>
                  <tr><td > <p style="color:white; text-align: justify; padding:10px;font-family:verdana" > Puteti acizitiona piesele si din magazinul fizic din Campeni </p> </td></tr> 
                  <tr><td style="padding-top:20px"> <center><img src="bazar.png" style="width:700px"> </center></td></tr> 
                  </table></center>
             
              
              <br>

              <button onclick="topFunction()" id="myBtn" title="Go to top">Du-te sus</button>


              
            </div></div>        
            
            <?php include("subsol.php") ?>
            
    
            
        

</body>
</html>
