<?php
$availableLang = ['fr', 'en', 'nl']; // Available languages on the website

if(isset($_GET['lang']) && in_array($_GET['lang'], $availableLang)) {
    $lang = $_GET['lang'];
    setcookie('userLang', $lang, time() + (60*60*24*5));
} 
elseif (isset($_COOKIE['userLang'])) {
    $lang = $_COOKIE['userLang'];
}
else {
    $lang = 'fr'; // Default language
}

$temp = [];

for($i = 0; $i < count($availableLang); $i++) {
    if ($availableLang[$i] != $lang) {
        $temp[] = '<a href="' . basename($_SERVER['PHP_SELF']) . '?lang=' . $availableLang[$i] .'">' . $availableLang[$i] . '</a>';
     };
};

$uiLang = implode(' | ', $temp);