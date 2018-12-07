<?php
if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    
    if($_FILES['file']['size'] <= 1000000) {
        $infosFile = pathinfo($_FILES['file']['name']);
        $extensionFile = $infosFile["extension"];
        $authorizedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
        
        if(in_array($extensionFile, $authorizedExtensions)) {
            move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . ($_FILES['file']['name']));
            echo "Le fichier est bien envoyé";
        }
        else {
            echo "Ce fichier n'est pas autorisé! Grrrrrr!";
        }
    }
    else {
        echo "Fichier trop volumineux";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
</head>
<body>
   <form action="file_upload.php" method="post" enctype="multipart/form-data">
       <input type="file" name="file">
       <button type="submit">Envoyer</button>
   </form>
    
</body>
</html>