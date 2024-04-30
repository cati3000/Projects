<div class="left" style="background-image: linear-gradient(to right, darkblue , black);">
            <center><h1 style="color:white; font-family:verdana">Meniu</h1></center>
            <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Cauta..." title="CAUTA IN PRODUSE">
            <ul id="myMenu">
              <li><a href="aux1.php">Turbine, Intercoolere & Compresoare</a></li>     
              <li><a href="aux2.php">Biele Si Pistoane</a></li>
              <li><a href="aux3.php">Axe Cu Came</a></li>
              <li><a href="aux4.php">Supape</a></li>
              <li><a href="aux5.php">Galerii Admisie Din Fibra De Carbon</a></li>
              <li><a href="aux6.php">Galerii Evacuare Inox</a></li>
              <li><a href="aux7.php">Cutii De Viteze Secventiale</a></li>
              <li><a href="aux8.php">Kit Protoxid De Azot</a></li>
            </ul>
    <style>
        input[type=text] {
              width: 430px;
              padding: 12px 5px;
              margin: 8px 0;
              box-sizing: border-box;
              border: 3px solid black;
              border-radius: 8px;
            }
        input[type=file] {
            background-color:  aliceblue;
            border-radius:0px 7px 7px 0px;
        }
        .alo{
            padding: 14px 14px;
            color: aquamarine;
            background-color: transparent;
             border-color: aquamarine;
            font-size: 17px;
             border-radius: 20px;
             width: 120px;
            font-weight:bold;
                margin-top: 20px;
        }
            .alo:hover{
            background-color: blue;
            border-radius: 20px;
            border: 2px solid white;
            color: white;
        }
    </style>
    <?php
    if($_SESSION['login']==true && $_SESSION['user']=="admin")/// daca sunt conectat ca admin pot sterge saau adauga produse noi
    {
        
        
            ?>
                <center><h2 style="color:white">Adauga Produs Nou</h2></center>
                <hr style="border:1px solid white; width:100%;">
                <br><br>
           <center><form method="post" action="" enctype="multipart/form-data"> 
                <b style="color:white; padding-left:10px">Denumire Produs:</b> <input type="text" name="new_prod" required=''><br>
                <b style="color:white; padding-left:10px">Descriere produs:</b> <input type="text" name="new_desc" required=''><br>
                <b style="color:white; padding-left:10px">Pret produs:</b> <input type="text" name="new_price" required=''><br>
                <b style="color:white; padding-left:10px">Categorie produs:</b> <input type="text" name="new_category" required=''><br>
                <b style="color:white; padding-left:10px">Stoc produs:</b> <input type="text" name="new_stoc" min="1" required=''><br>
                <b style="color:white; padding-left:10px">Imagine produs:</b> <input type="file" name="new_img" id="new_img"><br>
                <center><input type="submit" class="alo" value="Adauga" name="add">
                    <input type="reset" class="alo" value="Renunta"></center>
               </form></center>
            
            <?php
            if(isset($_POST['add']))
            {
                $new_prod="";
                $new_desc="";
                $new_category="";
                $new_stoc="";
                $new_price="";
                
                $new_prod=$_POST['new_prod'];
                $new_desc=$_POST['new_desc'];
                $new_category=$_POST['new_category'];
                $new_stoc=$_POST['new_stoc'];
                $new_price=$_POST['new_price'];
                
                
                if(empty($new_prod) ||  empty($new_desc) || empty($new_category) || empty($new_stoc) || empty($new_price))
                {
                    echo "<center><h2 style='color:white'>Completeaza spatiile</h2></center>";
                       
                }
                else
                {
                     include("upload_new_product.php");
                }
                    
                
            }
        ?>
    <br><br><br>
    <center><h2 style="color:white">Sterge Un Produs</h2></center>
                <hr style="border:1px solid white; width:100%;"><br>
    <center><form method="post">
        <b style="color:white; padding-left:10px">Intoduceti ID-ul produsului ce urmeaza a fi sters:</b> <input type="text" name="delete_id" required=''><br>
        <center><input type="submit" class="alo" value="Sterge" name="delete_prod">
                    <input type="reset" class="alo" value="Renunta"></center>
        </form></center>
        <?php
        if(isset($_POST['delete_prod']))
        {
            $id_prod_del="";
            $id_prod_del=$_POST['delete_id'];
            
            if(!empty($id_prod_del))
            {
                $sql="delete from produse where id_prod='$id_prod_del'";
                mysqli_query($conn, $sql);
            }
            else
                echo "<center><h2 style='color:white'>Introdu ID-ul</h2></center>";
            
        }
    }
    ?>
          </div>