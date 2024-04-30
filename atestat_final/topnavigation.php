<div class="topnav">
        <a class="active" href="index.php" title="Pagina Principala" ><i class="fa fa-fw fa-home"></i><b> Acasa</b></a>
<!--        <a href="offers.php" >Oferte</a>-->
        <a href="comunitate.php" ><i class="fa fa-globe"></i> Comunitate</a>
        
     <form action="" method="post">
         <?php
            if(!$_SESSION['login']==true)
            {
                ?>
                    <a href="conectare.php" title="Creaza-ti Cont sau Autentifica-te"  ><i class="fa fa-fw fa-user"></i> Log In</a>
                <?php
            }
            else
            { 
                $user=$_SESSION['user'];
                ?>
                    <a href="cos.php" title="Cosul dvs. De Cumparaturi" ><i style="font-size:16px" class="fa">&#xf07a;</i> Cos De Cumparaturi</a>
                    <?php
                            if($_SESSION['user']=='admin' && $_SESSION['login']==true)
                                echo "<a href='comenzi.php' >Comenzi</a>";    
                    ?>
                    <div  style=" width:40px; height:20px; float:left; padding-top:14px;  "> <b style="color:yellow; margin-top:10px; padding:10px; font-family:verdana"> <?php  echo "$user"; ?></b></div>

         
<!--                    <input type="submit" value="Deconecteaza-te" name="logout" class="logout">-->
         <button type="submit" name="logout" class="logout"><b>Deconecteaza-te<i class=" fa fa-fw fa-sign-out"></i></b></button>
                <?php
            }
           
         ?>
         
     </form>
            <div class="dropdown" style="float:right; margin-right:20px;">
              <span style="color:white; margin-right:3px"> Tel: 0747474747</span>
              <div class="dropdown-content">
                  <p style="color:white; font-size:13px;">L-S: <i>10:00-18:00</i><br> D: <i>Inchis</i></p>
              </div>
            </div>
     <?php
     if(isset($_POST['logout']))
     {
            $_SESSION['login'] = false;/// aici te deconectezi   
            

         echo "<meta http-equiv='refresh' content='0'>";
     }
     ?>

    </div>

                    
