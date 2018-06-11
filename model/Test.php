<?php

function chargerClasse($classe){
    require $classe.'.php';
}

spl_autoload_register('chargerClasse');

$heros = new Personnage(Personnage::FORCE_MOYENNE, 'La Bourboule', 0);
$victime = new Personnage(5, 'Mulhouse', 25);
echo 'Personnage héros de force '.$heros -> force().', de localisation '.$heros -> localisation().' et ayant '.$heros -> degats().' degats subis';
for($i=1; $i<11; $i++) {
    echo $heros -> experience();
    $heros -> frapper($victime);
    $heros -> gagnerExperience();
    echo '<p/>';
}
echo $victime -> degats();