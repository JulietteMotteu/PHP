<?php
$directoryPath = "." . DIRECTORY_SEPARATOR . "..";

function createList($path) {
    $liste = "<ul>";
     foreach(glob($path . DIRECTORY_SEPARATOR . "*") as $filename){
         if(is_dir($filename)) {
             $liste .= '<li class="dir"><i class="fas fa-folder"></i>' . basename($filename) . createList($filename) . '</li>';
         }
         else {
             $liste .= '<li><i class="fas fa-file"></i>' . basename($filename) . '</li>';
         }
    }
    return $liste . '</ul>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File explorer</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    
    <style>
    
        .dir > ul {
            display: none;
        }
        
        i {
            color: #9a44b4;
            padding-right: 10px;
        }
        
        ul {
            list-style-type: none;
        }
    
    </style>
</head>
<body>
   
    <div id="listFiles">
    <?php
        
    echo createList($directoryPath);
   
    ?> 
    </div>
    
    <script>
    
        $(document).ready(function(){
            $('#listFiles').click(function(e){
                let target = $(e.target);
                target.toggleClass('dir');
                target.children('i').toggleClass('fa-folder-open');
                console.log(target.children('i'));
            })
        })
    
    </script>
</body>
</html>