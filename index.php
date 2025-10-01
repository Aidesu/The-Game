<?php

include_once "./models/Personnage.php";
include_once "./models/GameEngine.php";


$game = new GameEngine();

$game->addCombattant(new Humain("Loic"));
$game->addCombattant(new Orc("Yannick"));
$game->addCombattant(new Elfe("Bertrant"));
$game->addCombattant(new Elfe("Michel"));
$game->addCombattant(new Orc("Yassine"));
$game->addCombattant(new Humain("Wahid"));
$game->start();

$game->getJoueur();

while(!$game->getExit()){
            echo "\e[0;36m#\n";
            echo "#\e[0;35m  Le combat commence ! \n";
            echo "\e[0;36m#\n";
            $game->tourDeJeu();
            $game->setExit();
    
}