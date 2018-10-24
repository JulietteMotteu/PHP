<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail</title>
</head>
<body>
   
<?php 

    $to = 'juliette@if3.be';
    $subject = 'Titre du mail';
    $message = 'Corps du mail';
    
    // @ devant fonction php cache les messages d'erreur ou de warning
    if (@mail($to, $subject, $message)) {
        echo 'Le mail est parti';
    }
    else {
        echo 'Problème technique';
    }
    
?>
    
</body>
</html>