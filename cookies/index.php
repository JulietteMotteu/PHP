<?php

$textes = [
    'fr' => [
        'lang' => 'fr',
        'titre' => 'Demo site multilangues + cookies',
        'para1' => 'Texte FR - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, libero aliquam quae! Reiciendis quo nam repellat, ipsam quod error sed voluptatem distinctio perspiciatis cum commodi quibusdam, alias blanditiis modi facere atque dolores libero neque ab nobis laudantium eius. Explicabo architecto sint excepturi ipsa, sed adipisci dicta, modi temporibus consectetur minus laudantium reiciendis expedita. Quaerat perferendis est dolorum error quibusdam quod, ratione eaque quisquam quis qui. Quam corporis tempore aperiam inventore libero voluptate voluptates consequuntur porro molestiae incidunt voluptatibus sapiente, nisi, quod distinctio facere nulla eligendi. Quasi id delectus, rerum, minus nisi labore praesentium atque repudiandae! Est, ipsam enim maiores reiciendis' 
    ],
    'en' => [
        'lang' => 'en',
        'titre' => 'Multilingual website demo + cookies',
        'para1' => 'Texte EN - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, libero aliquam quae! Reiciendis quo nam repellat, ipsam quod error sed voluptatem distinctio perspiciatis cum commodi quibusdam, alias blanditiis modi facere atque dolores libero neque ab nobis laudantium eius. Explicabo architecto sint excepturi ipsa, sed adipisci dicta, modi temporibus consectetur minus laudantium reiciendis expedita. Quaerat perferendis est dolorum error quibusdam quod, ratione eaque quisquam quis qui. Quam corporis tempore aperiam inventore libero voluptate voluptates consequuntur porro molestiae incidunt voluptatibus sapiente, nisi, quod distinctio facere nulla eligendi. Quasi id delectus, rerum, minus nisi labore praesentium atque repudiandae! Est, ipsam enim maiores reiciendis' 
    ]
];

require_once('cookie.php');

?>
<!DOCTYPE html>
<html lang="<?php echo $textes[$lang]['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <title>Demo site multilangues + cookies</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
   
   <header>
       <?php echo $uiLang; ?>
       <h1><?php echo $textes[$lang]['titre']; ?></h1>
   </header>
   
   <main>
       <p><?php echo $textes[$lang]['para1']; ?></p>
   </main>
   
   <footer>
       <p>2018 - Interface3</p>
   </footer>
    
</body>
</html>