<?php

include_once "./models/Personnage.php";
include_once "./models/GameEngine.php";


$game = new GameEngine();
$game->start();

$game->addCombattant(new Humain("Loic"));
$game->addCombattant(new Orc("Yannick"));
$game->addCombattant(new Elfe("Bertrant"));

echo $game->getJoueur();

$exit = false;
while(!$game->getExit()){
    $action = readline("\e[0;36m# \e[0;35m Entrez votre action \e[1;33m (1) Continuer le combat\e[0;35m, \e[0;31m(2) Quitter le combat\e[0;35m : ");
    switch ($action) {
        case 1:
            echo "\e[0;36m#\n";
            echo "#\e[0;35m  Le combat continue ! \n";
            echo "\e[0;36m#\n";
            $game->tourDeJeu();
        break;
        case 2:
            $exit = true;
        break;
    }
}