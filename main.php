<?php

include_once "./models/Personnage.php";


$player1 = new Elfe("Michel");
$player2 = new Orc("Gerome");
$player3 = new Humain("Ludo");
$player4 = new Orc("Wahid");


function fight($fighter1, $fighter2) {
    $exit = false;
    while(!$exit){
        if ($fighter1->getLife() <= 0){
            $fighter1->dead();
            $exit = true;
            return;
        } elseif ($fighter2->getLife() <= 0){
            $fighter2->dead();
            $exit = true;
            return;
        }
        else {
            $fighter1->attack($fighter2);
            echo $fighter1->getName() . " a attaquer " . $fighter2->getName() . " il lui reste " . $fighter2->getLife() . " hp\n";
            
            $fighter2->attack($fighter1);
            echo $fighter2->getName() . " a attaquer " . $fighter1->getName() . " il lui reste " . $fighter1->getLife() . " hp\n";
        }
        
        
        
    }

}

fight($player3, $player4);