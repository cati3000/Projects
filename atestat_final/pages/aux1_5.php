<html>
<head>
            <link rel="icon" href="icon.png" type="image/gif" zise="16x16">
            <title>ProTuning Shop</title>
                   <link type="text/css" rel="stylesheet" href="ceseu.css" >
                   <link type="text/css" rel="stylesheet" href="edit_img.css" >
                   <link type="text/css" rel="stylesheet" href="form_tab.css" >

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
           
        }

        * {
          box-sizing: border-box;
        }

        /* Create a column layout with Flexbox */
        .row {
          display: flex;
        }

        /* Left column (menu) */
        .left {
          flex: 35%;
          padding: 15px 0;
        }

        .left h2 {
          padding-left: 8px;
        }

        /* Right column (page content) */
        .right {
          flex: 45%;
          padding: 15px;
        }
        .mostright{
            flex: 20;
            padding: 15px;
        }
        </style>
</head>
<body>
        <div class="topnav">
      <a class="active" href="index.php"><b>Acasa</b></a>
      <a href="#news">Oferte</a>
      <a href="#contact">Contact</a>
      <a href="#about">Despre</a>
      <a href="#pulpe" >Cont</a>
      <a href="conectare.php" >Log In</a>
      <a href="cos.php" >Cos De Cumparaturi</a>
            <button class="logout"><b>Deconecteaza-te</b></button>
    </div>
          


   
        <br>
    
        <div class="row">
<!--          <div class="left" style="background-color:#4CAF50;">-->
                         <div class="left" style="background-image: linear-gradient(to right, blue , black);">

            <img id="da" src="intercular1.jpg">
          </div>

          <div class="right" style="background-color:#1A1717;">
              <table id="ped" border="1px" bordercolor="white">
                  <tr>
                      <td id="formatare_col_doi"><h2 style="color:white; padding-left:20px;">Intercooler ColdTech IN/OUT 50mm</h2></td>
                  </tr>
                  <tr>
                      <td id="formatare_col_doi"><p style="color: white;">Detalii: <br> - Dimensiuni(L x l x H mm): 550 x 89 x 350 <br> - Diametru Intrare/ Iesire: 50mm <br>- Material: Aluminiu <br> - Distanta prinderi(diagonala): 575mm </p></td>
                  </tr>
              </table>
          </div>
            <div class="mostright" style="background-color:black;">
                <h1 style="color:white;">439.99 RON</h1>
                <form>
                    <center><input type="submit" name="adauga_in_cos" value="ADAUDA IN COS" id="rcorners1"></center>
                </form>
                    <br>
                <a href="cos.php"><button id="buton"><b>COS DE CUMPARATURI</b></button></a>
            </div>
        </div>

        

</body>
</html>
