<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sécurité PHP</title>
</head>
<body>
 
 <h1>Sécurité PHP</h1>
  <?php
  
    $langPermises = ["fr", "en", "nl"];
    
    $monPost = "en";
    
    echo 'Est-ce que "eng" est dans mon tableau ? ';
    var_dump(in_array($monPost, $langPermises));
    
    echo '<br><br>Est-ce que "de" est dans mon tableau ? ';
    var_dump(in_array("de", $langPermises));
    
    echo '<hr>';
    echo '5 est-il entier? ';
    var_dump(is_int(5));
    echo '<hr>';
    
    echo '5.5 est-il entier? ';
    var_dump(is_int(5.5));
    echo '<hr>';
    
    echo 'true est-il entier? ';
    var_dump(is_int(true));
    echo '<hr>';
    
    function isPositive($nbr) {
        return is_int($nbr) && $nbr > 0;
    }
    
    echo '5 est-il un entier positif? ';
    var_dump(isPositive(5));
    echo '<hr>';
    
    echo '-5 est-il un entier positif? ';
    var_dump(isPositive(-5));
    echo '<hr>';
    
    // Attention renvoie false si mauvais ou la valeur filtrée si c'est bon
    $email = "juju@gmail.com";
    var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
    echo '<hr>';
    
    $email = "jujugmail.com";
    var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
    echo '<hr>';
    
  ?>
   
</body>
</html>