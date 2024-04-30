<?php
error_reporting(0);
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
     <link rel="icon" href="icon.png" type="image/gif" zise="16x16">
            <title>ProTuning Shop</title>
                   <link type="text/css" rel="stylesheet" href="ceseu.css" >
                   <link type="text/css" rel="stylesheet" href="edit_img.css" >
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
                transition-delay: 0.05s;
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
          border-radius:15px;
          padding:5px;
          margin: 2px;
            margin-top: 8px;
          margin-right: 10px;    
            margin-left: 10px;
            text-align: center;
            font-family:verdana;
            transition-delay: 0.05s;
        }
        .topnav a.active:hover {
        background-color: black;
        width: auto;
        color: white;
        border-radius: 15px;
        border: 2px solid black;
    
           
}
    </style>
</head>
<body>
    
    <?php
    include("topnavigation.php");
    ?>
    <div style="background-color:#1C1C1C; height:1000px;">
            <h2 style="color: white;" >Oferte Irefutabile</h2>
        <?php
            for($i=1; $i<=4; $i++)
            {
                ?>
                <table class="offers-box">
                    <tr>
                        <td>AAAAAAAAAAAAA</td>
                        <td>AAAAAAAAAAAAA</td>
                    </tr>
            </table>
                <?php
            }
        ?>
       
    </div>        
            
           <?php include("subsol.php"); ?>
            
   
            
        

</body>
</html>
