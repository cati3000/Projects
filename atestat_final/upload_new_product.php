<?php

    $caleapoza_posibila="local/".basename($_FILES["new_img"]["name"]);
	
		//$dir_cr=getcwd();//aflu directorul curent
		//echo $dir_cr;
		///$da=date(j.m.Y);
		if(is_uploaded_file($_FILES['new_img']['tmp_name']))
        {///daca s-a incarcat complet
		move_uploaded_file($_FILES['new_img']['tmp_name'],"local/".$_FILES['new_img']['name']);///mutam fisierul temporar in fisierul imagini cu numele convenabil
		}
		$caleapoza="local/".basename($_FILES['new_img']['name']);

        $interogare = "INSERT INTO produse(denumire, descriere, pret, categorie, stoc, discount,imagine) VALUES('$new_prod','$new_desc','$new_price', '$new_category','$new_stoc', '0','$caleapoza')";
        
			if( $error = mysqli_query($conn, $interogare))
			{
				?>	<script type="text/javascript">
								alert("Produs adaugat cu succes!");
 				</script>
             <?php 
			}
			else
			{
					?>	<script type="text/javascript">
								alert("Eroare la INSERT!");
 				</script>
             <?php 
			}

?>