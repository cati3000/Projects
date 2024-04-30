<?php
error_reporting(0);
    session_start();
?>

<?php
include("conecting_to_database.php");

?>
<!DOCTYPE html>
<html>
<head>
   <link rel="icon" href="icon.png" type="image/gif" zise="16x16">
    <title>ProTuning Shop</title>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                   <link type="text/css" rel="stylesheet" href="ceseu.css" >
                   <link type="text/css" rel="stylesheet" href="form_tab.css" >
                   <link type="text/css" rel="stylesheet" href="format_imagine.css" >
                   <link type="text/css" rel="stylesheet" href="main_style.css" >


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
            #alo{
                padding: 12px 20px;
                background-color: transparent;
                color: aquamarine;
                border-color: aquamarine;
                font-size: 17px;
                 border-radius: 20px;
                font-weight:bold;
                float: right;
            }
         #alo:hover{
            background-color: blue;
             border-radius: 20px; }
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

    </style>
</head>
<body>
       
   <?php
    include("topnavigation.php");
    ?>

        <div class="row">
             <?php include ("search.php") ?> <!-- left layer-->

          <div class="right" style="background-color:#1A1717;">
              <?php
                $sql = "SELECT COUNT(categorie) FROM produse WHERE categorie=2";
                $result = $conn->query($sql);
                if ($result->num_rows > 0 && $row = $result->fetch_assoc())
                {
                    ?>
                    <h2 style="color: white;">Alege produse. Produse disponibile: <?php echo $row['COUNT(categorie)'];?></h2>
              
                    <?php  
              }
              $sql = "SELECT id_prod, denumire, descriere, imagine, pret, stoc, discount, imagine FROM produse where categorie=2";
            $result = $conn->query($sql);
             foreach ($result as $index => $array)   
             {
                 $id=$array['imagine'];
                 ?>
                            <center><table style="border:2px solid black;" >
                          <tr>
                                <td id="formatare_col_unu"><img style="width:200px; height:200px" src="<?php echo $id?>"></td>
                              
                              <td id="formatare_col_doi"> <h3 style="padding-left:20px; color:white"><?php echo $array['denumire']?>
                                  <?php
                                      if($_SESSION['login']==true && $_SESSION['user']=="admin")
                                      {
                                          $aidi=$array['id_prod'];
                                          echo "<b style='padding: 0px 5px 0px 5px;background-color:green; color:black'>ID: $aidi </b>";
                                      }
                                      ?>
                                  </h3>  
                                  
                                  <?php
                                        if($array['discount'] && $array['stoc']) 
                                        {
                                            ?>
                                            <h3 style="float:right; background-color:yellow; border-radius:10px; padding:5px;">-<?php echo $array['discount']?>%</h3>
                                               <h2 style="color:white; padding-left:20px;line-height: 2px;   text-decoration: line-through 3px solid red;"> <?php echo $array['pret']; ?> RON</h2>

                                                  <h2 style="color:white; padding-left:20px ">
                                            <?php
                                                $p=$array['pret']-floor(($array['pret']*$array['discount'])/100); 
                                                echo $p; 
                                            ?> RON</h2>
                                  
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                 <h2 style="color:white; padding-left:20px "><?php echo $array['pret'] ?> RON</h2>
                                            <?php
                                        }
                                      
                                      ?>
                                  <?php
                                    if($array['stoc']>0)
                                    { ?> <h3 style="color:#2ECC71; padding-left:20px; float:left" > Disponibil In Stoc</h3> <?php }
                                    else
                                    { ?> <h3 style="color:#EC7063;padding-left:20px;  float:left" > Stoc Epuizat</h3> <?php }
                                 ?>
                                  <a href="aux1_1.php?record=<?php echo $array['id_prod']?>"> <button id="alo">Vezi Detalii >></button> </a>
                                  
                              </td>
                              
                          </tr>
                          </table></center>
              <?php
            }

              ?>
              
          </div>
        </div>
        <?php include("subsol.php") ?>
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
      
</body
</html>
