<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mon site</title>
</head>
<body>
   
    <?php
    
    include("./includes/header.php");
    
    include("./includes/nav.php");
    
    $pagesPossibles = ['page1', 'page2'];
    
    if(isset($_GET['p'])) {
        if (in_array($_GET['p'], $pagesPossibles)) {
            include ($_GET['p'] . ".php");
        }
        else {
            header ('location: ./index.php');
            echo 'Casse-toi!';
        }
    }
    else {
        include ("./accueil.php");
    }
    
    include("./includes/footer.php");
    
    ?>
    
    
</body>
</html>