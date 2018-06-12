<?php

function chargerClasse($classe){
    require $classe.'.php';
}

spl_autoload_register('chargerClasse');

$test = new Character('Terminator', 63 , 1, 2, 10);

$db = new \PDO('mysql:host=localhost;dbname=phpetpoo;charset=utf8', 'root', '');
$charManager = new CharacterManager($db);
echo 'OK Connection BDD <br>';
//$charManager->create($test);
//echo 'OK ajout BDD';

$retour = $charManager->read(4);
echo ($retour->name());

