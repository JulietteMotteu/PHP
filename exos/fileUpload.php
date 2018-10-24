<?php

if (isset($_POST['charger'])){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
    echo $target_file;
    var_dump($_FILES['fileToUpload']);
    echo mime_content_type($_FILES['fileToUpload']['tmp_name']); // on utilise tmp_name pour accèder au fichier sur le serveur 
    echo $_FILES['fileToUpload']['tmp_name'];
    // realpath() -> recalculer un chemin absolu
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File upload</title>
</head>
<body>
    
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload">
        <button type="submit" name="charger">Charger l'image</button>
    </form>
    
</body>
</html>