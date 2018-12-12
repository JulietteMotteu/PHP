<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini-chat</title>
    <style>
        input, label {
            margin: 10px;
        }
    
    </style>
</head>
<body>
    
    <form action="mini-chat-post.php" method="post">
       
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo"><br>
        <label for="message">Message</label>
        <input type="text" name="message">
        <button type="submit">Envoyer</button>
        
    </form>
    
</body>
</html>