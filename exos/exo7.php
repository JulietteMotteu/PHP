<?php   
/*7. Créez un formulaire de contact (input pour email, textarea pour message et button pour envoyer) qui envoi un mail au webmaster

Challenge : le mail contient aussi l'IP et le navigateur du visiteur -> $_SERVER */
$envoye = '';
if(isset($_POST['email']) && isset($_POST['message'])) {
    $to = 'juliette@if3.be';
    $from = 'From : ' . $_POST['email'];
    $subject = $_POST['sujet'];
    $ip = $_SERVER['SERVER_ADDR'];
    $nav = $_SERVER['HTTP_USER_AGENT'];
    $message = $_POST['message'] . $ip . $nav;
    mail($to, $subject, $message, $from);
    $envoye = "L'email a été envoyé";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exo 7</title>
</head>
<body>
   
   <form action="" method="post">
       <input type="email" name="email">
       <input type="text" name="sujet">
       <textarea name="message" id="" cols="30" rows="10"></textarea>
       <button>Envoyer</button>
   </form>
   
   <p><?php echo $envoye ?></p>
    
</body>
</html>