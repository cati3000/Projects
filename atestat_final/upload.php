<?php
    $user=$_SESSION['user'];

            
    $statusMsg = '';

    // File upload path
    $targetDir = "uploads/";/// directorul din htdocs
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"]))
    {
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes))
        {
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
            {
                // Insert image file name into database
    //            $insert = $conn->query("INSERT into conturi (avatar) VALUES ('".$fileName."')  where user='$user'");
                $insert = $conn->query("UPDATE conturi set avatar='".$fileName."' WHERE user='$user'");
                if($insert){
                    $statusMsg = "Fisierul ".$fileName. " a fost incarcat cu succes.";
                    echo "<meta http-equiv='refresh' content='0'>";
                }else{
                    $statusMsg = "Incercati din nou.";
                } 
            }else{
                $statusMsg = "A aparut o eroare la incarcarea fisierului";
            }
        }else{
            $statusMsg = 'Doar extensiile JPG, JPEG, PNG, GIF, & PDF sunt permise.';
        }
    }

    // Display status message
    echo $statusMsg;
  
?>

















