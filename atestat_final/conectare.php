
<?php
include("conecting_to_database.php");
error_reporting(0);
   session_start();
?>

<!DOCTYPE html>
<html lang="ro">
<head>
<link rel="icon" href="icon.png" type="image/gif" zise="16x16">
            <title>Log In</title>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                   <link type="text/css" rel="stylesheet" href="ceseu.css" >
                    <link type="text/css" rel="stylesheet" href="incerc.css" >

        <style>
        body {
            background-repeat:no-repeat;
            background-size:100% 100%;
            background-attachment: fixed;
            font-family: verdana;
        }
            td{
                color: white;
            }
        .row {
          display: flex; 
        }
        .right {
          flex: 34%;
          padding: 15px;
        }
            .left {
          flex: 66%;
                min-height: 600px;
          padding: 15px;
        }
        input[type=text] {
              width: 430px;
              padding: 12px 5px;
              margin: 8px 0;
              box-sizing: border-box;
              border: 3px solid black;
              border-radius: 8px;
                background-color: lightgray;
            }
            
            
        input[type=password] {
          width: 430px;
          padding: 12px 5px;
          margin: 8px 0;
          box-sizing: border-box;
          border: 3px solid black;
          border-radius: 8px;
             background-color: lightgray;
             }
        input[type=email] {
              width: 430px;
              padding: 12px 5px;
              margin: 8px 0;
              box-sizing: border-box;
              border: 3px solid black;
              border-radius: 8px;
             background-color: lightgray;
            }
            
            input[type=text]:hover, input[type=password]:hover, input[type=email]:hover
            {
                 background-color: white;
/*                border-color: white;*/
            }
               
            
             textarea{
            width: 460px;
            height: 100px;
            resize: none;
            border: 3px solid black;
             border-radius: 8px;

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
            
        }
            ::placeholder{
                color: grey; 
                font-family: verdana;
            }

        </style>
    
</head>
<body >
        
         <?php
    include("topnavigation.php");
    ?>     
            
    <div class="row">
         <div class="left" style="background-image: linear-gradient(to right, darkblue , black); color:white">
             <?php
                if(!$_SESSION['login'])
                { ?> <h1 style="color:white;" > Creeaza-ti Cont:</h1> <?php }
                else
                { ?> <h1 style="color:white;" > Contul dvs. este:</h1> <?php }
             ?>
             <hr style="border:1px solid white; width:100%;">
             
             <?php
             
             if (isset( $_POST['create']))
             {
                    $user="";
                    $password="";
                    $check_password="";
                    $email="";
                    $pers_type="";
                    $adress="";
                    $avatar="";
                                 
                        $_SESSION['user'] = $_POST['user'];
                        $user=$_SESSION['user'];

                        $password=$_POST['parola'];

                        $check_password=$_POST['corfirm_parola'];

                        $email=$_POST['email'];

                        $pers_type=$_POST['pers'];
                        
                        $adress=$_POST['adress'];
                 
                        $avatar=$_POST['avatar'];
                            
                        if( empty($user) || empty($password) || empty($check_password) || empty($email) || empty($adress) || empty($pers_type) || empty($avatar))/// verific daca toate campurile au fost completate
                        {
                            ?>
                                            <center><h2 style="color:red"><?php  echo "Completati Toate Campurile";?> </h2></center>
                             <?php 
                        }
                     else
                     {
                            $sql = "SELECT  user FROM conturi";////  extrag toate conturile deja existente din  baza de date
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0)
                                    {
                                           $da=true;/// presupun ca user-ul nu exista
                                          while($row = $result->fetch_assoc())
                                          {

                                              if($row["user"]==$user)/// verific daca user ul din fomular este acelasi cu unul deja inregistat in baza 
                                              { 
                                              ?>
                                                    <center><h2 style="color:red"><?php  echo "Acest utilizator exista deja";?> </h2></center>

                                                <?php 
                                                  $da=false;
                                                  break;
                                             }
                                          }
                                    }   
                                    if($da==true)/// daca user-ul nu exista deja in baza de date verific parolele si il bag in baza de date
                                     {
                                            if(strlen($password)<8)
                                            {    echo "<center><h2 style='color:red'>Parola trebuie sa contina minim 8 caractere! </h2></center>";}
                                            else
                                            {
                                                if($password == $check_password)
                                                 {
                                                     $sql = "INSERT INTO conturi (user, password, email, adress, pers, avatar) VALUES ('$user', '$password', '$email', '$adress', '$pers_type', '$avatar')";

                                                        if ($conn->query($sql) === TRUE)
                                                        {
                                                            $_SESSION['login'] = true;/// variabila booleana ce retine daca m-am conectat
                                                            ?>
                                                               <script type="text/javascript">
                                                                    window.location.href = "index.php";
                                                                    </script>
                                                            <?php
                                                        } 
                                                        else
                                                        {
                                                              ?>
                                                            <center><h2 style="color:white"><?php  echo "Ceva nu-i oblu";?> </h2></center>
                                                            <?php 
                                                        }
                                                 }
                                                 else
                                                 {
                                                     ?>
                                                         <center><h2 style="color:red"><?php  echo "Parole gresite. Introduceti din nou";?> </h2></center>

                                                        <?php
                                                }
                                            }
                                            if($_SESSION['login'])
                                                 echo "<meta http-equiv='refresh' content='0'>";/// refresh
                                                
                                    }
                     }
                }
                else          
                {
                    if(!$_SESSION['login'])//// daca nu s-a dat click pe creeaza atunci incarc formularul
                    { 
                    ?>
                        <form action="" method="post">
                   <center> <table>
                        <tr>
                            <td><b>Nume de utilizator</b></td>
                            <td colspan="2"><input  type="text" name="user" pattern="[^ '\x22]+" title="Litere Mari/Mici, Cifre & Unele Caractere Speciale" placeholder="ex:nume_prenume sau orice username valid"> </td><td></td>
                        </tr>
                        <tr>
                            <td><b>Parola</b></td>
                            <td><input  type="password" name="parola" placeholder="Introduceti-va Parola"></td>
                        </tr>
                        <tr>
                            <td><b>Confirmare Parola</b></td>
                            <td><input  type="password" name="corfirm_parola" placeholder="Introduceti-va Parola Din Nou"></td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td><input  type="email" name="email" placeholder="Introduceti Un Email Valid"></td>
                        </tr>
                        <tr>
                            <td valign="top" style="padding-top:21px"><b>Adresa</b></td>
<!--                            <td><textarea name="adress"></textarea></td>-->
                            <td><input type="text" name="adress" placeholder="Introduceti Adresa Completa"></td>
                        </tr>

                         <tr height="50px">
                            <td><b>Persoana</b></td>
                            <td><input type="radio" name="pers" value="Persoana Fizica">Fizica<input type="radio" name="pers" value="Persoana Juridica">Juridica</td><br>
                       </tr>

                         
                       </table></center>
                            
                       <center><table>
                       <tr>
                           <td colspan="2"><center><h3>Alege-ti Avatarul</h3></center></td>
                       </tr>
                        <tr>
                            <td> <center><img style="width:200px; height:200px" src="uploads/avatar.jpg"></center></td>
                            <td> <center><img style="width:200px; height:200px" src="uploads/avatar1.jpg"></center></td>
                       </tr>
                       <tr>
                           <td align="center" >Avatar1<input type="radio" value="avatar.jpg" name="avatar"></td>
                           <td align="center">Avatar2<input type="radio" value="avatar1.jpg" name="avatar"></td>
                       </tr>
                           <tr>
                            <td colspan="2" align="center"><input class="alo" type="submit" name="create" value="Creeaza"> <input class="alo" type="reset" name="res" value="Reseteaza"> </td>

                        </tr>
                       </table></center>
                </form>
             
                   
             
                     <?php
                    } 
                     
                 }
                
             
             ?>
             <br>
             <text ><strong>Nota: </strong><li>Toate Campurile Sunt Obligatorii!</li>
                    <li>Avatarul Poate Fi Modificat Ulterior Cu Orice Alta Imagine</li>
             </text>
          </div>

          <div class="right" style="background-color:#1A1717;">
              <h1 style="color:white;" > Autentificare:</h1>
             <hr style="border:1px solid white; width:100%;">
             
            <?php
              if(isset($_POST['go']))
              {
                        $user="";
                        $password="";
//                        echo "$user $password";
                        $_SESSION['user'] = $_POST['user'];
                        $user=$_SESSION['user'];
                        $password=$_POST['password'];
//                  if(isset($user) && isset($password))
                  if( !(empty($user) or empty($password)) )
                  {
                        $sql = "SELECT user, password FROM conturi";
                        $result = $conn->query($sql);
                        $da=false;/// pp ca nu exista in baza de date contul introdus in formular
                        if ($result->num_rows > 0)
                        {
                          // output data of each row
                          while($row = $result->fetch_assoc())
                          {

                              if($row["user"]==$user && $row["password"]==$password)
                              { 
                                    $da=true;/// contul exista in baza de date
                                  $_SESSION['login'] = true;
                                  ?>
                                    <script type="text/javascript">
                                        window.location.href = "index.php";
                                    </script>
                                <?php
                                  echo "<meta http-equiv='refresh' content='0'>";/// auto-refresh
                                  break;
                              }
                          }

                        }   
                       if(!$da)
                              {
                                  ?>
                                    <center><h2 style="color:red"><?php  echo "Parola sau nume de utilizator gresite";?> </h2></center>

                                <?php 
                              }
                  }
                  else
                  { 
                   ?>
                         <center><h2 style="color:red"><?php  echo "Toate campurile sunt obligatorii pantru a va conecta!";?> </h2></center>

                    <?php 
                 }
              }
              else
              {
                  if(!$_SESSION['login'])
                  {
                  ?>
              
                     <form method="post" action="" >
                  <table>
                    <tr>
                        <td width="170px"><b>Nume de utilizator:</b></td>
                        <td><input type="text" name="user" placeholder="Introduceti Numele de Utilizator"></td>
                      </tr>
                    <tr>
                        <td width="170px"><b>Parola:</b></td>
                        <td><input type="password" name="password" placeholder="Introduceti Parola"></td>
                      </tr>
                      <tr>
                          <td colspan="2" align="center"> <input type="submit" value="Conectare" class="alo" name="go"></td>
                      </tr>
                  </table>
              </form>
                    <?php
                  }
                  else
                  {
                      ?>
                        <center><h2 style="color:white"> <?php  echo "Sunteti conectat ca $user";?>  </h2></center>

                    <?php
                  }
                  
              }
              
              ?>
              
          </div>
        </div>
    
    </body>
</html>
