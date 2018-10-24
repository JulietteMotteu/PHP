<?php
/*9. Utilisez jQuery datepicker pour choisir une date via un calendrier dans un formulaire et insérez-la dans une DB

Hardcore : valider la date avant de l'insérer : elle doit être bien formatée et valide 
-> datetime par ex. une regular expression peut être une autre solution*/
require_once("./config.php");

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage();
    $pdo = null;
    die();
}
$msg = '';

if(isset($_POST['datepicker'])) {
    try {
        $conversionDate = new DateTime($_POST['datepicker']);
        $date = $conversionDate->format('Y-m-d');
        $statement = $pdo->prepare('INSERT INTO date_formulaire
                                (date) 
                                VALUES 
                                (:datepicker)');
        $statement->bindValue(':datepicker', $date, PDO::PARAM_STR);

        $statement->execute();

        $msg = 'La date insérée est ' . $date;
        var_dump(true);
    }
    catch (Exception $e) {
        var_dump(false);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo 9</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <link rel="stylesheet" href="./jquery-ui-1.12.1.custom/jquery-ui.min.css">
    <script>
        $(document).ready(function() {
            $("#datepicker").datepicker();
        })
    
    </script>
</head>
<body>
   
   <form action="" method="post">
       <p>Date: <input type="text" id="datepicker" name="datepicker"></p>
       <button type="submit">Submit</button>
       <p>
           <?php
                echo $msg;
           ?>
       </p>
   </form>
    
</body>
</html>