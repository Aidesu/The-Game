<?php 

include_once (__DIR__."/Personnage.php");

class GameEngine {
    private array $combattants = [];
    private array $arrene = [];
    private bool $exit;

    public function addCombattant(Personnages $personnage) {
        $this->combattants[] = $personnage;
    }

    public function start() {
        echo "initializing OK\n";
        $this->exit = false;
        system('clear');
        echo "\e[0;36m##########################################################################\e[0m\n";
        echo "\e[0;36m#                                                                        #\e[0m\n";
        echo "\e[0;36m#                         \e[0m\e[0;35m Welcome to The Game !\e[0m\e[0;36m                         #\e[0m\n";
        echo "\e[0;36m#                                                                        #\e[0m\n";
        echo "\e[0;36m##########################################################################\e[0m\n";
    }

    private function getId(): int {
        $nmb = rand(0, count($this->combattants) -1);
        return $nmb;
    }

    public function getJoueur() {
        $nmb1 = $this->getId();
        $this->arrene[] = $this->combattants[$nmb1];
        $nmb2 = $this->getId();
        while ($nmb2 == $nmb1){
            $nmb2 = $this->getId();
        }
        $this->arrene[] = $this->combattants[$nmb2];
        $fighter1 = $this->arrene[0];
        $fighter2 = $this->arrene[1];
        echo  "\e[0;36m#     \n#                   \e[1;32m".$fighter1->getName() . "\e[0;35m et \e[1;32m" . $fighter2->getName() . "\e[0;35m entre dans l'arene\n\e[0;36m# \e[0m    \n";
    }

    public function tourDeJeu() {
        $fighter1 = $this->arrene[0];
        $fighter2 = $this->arrene[1];
        if ($fighter1->getLife() >= 0 && $fighter2->getLife() >= 0){
            $fighter1->attack($fighter2);
            $fighter2->attack($fighter1);
    //         if ($fighter2->getLife() >= 0) {
            
    //         echo "#  ". $fighter1->getName() . " inflige " . $fighter1->getStrength() . " degat a " . $fighter2->getName() . " il lui reste " . $fighter2->getLife(). "hp \n";
    //         } else {
    //             echo $fighter1->getName() . " a battut " . $fighter2->getName() . " jusqu'au sang ". "\n";
    //             $this->nettoyerMort(1);
    //         }
    //         if ($fighter1->getLife() >= 0) {
    //         echo $fighter2->getName() . " inflige " . $fighter2->getStrength() . " degat a " . $fighter1->getName() . " il lui reste " . $fighter1->getLife(). "hp \n";
            
    //         } else {
    //             echo $fighter2->getName() . " a battut " . $fighter1->getName() . " jusqu'au sang ". "\n";
    //             $this->nettoyerMort(0);
    //         }
        }
    echo "Un tour passer\n";
}

    public function nettoyerMort($x) {
        unset($this->arrene[$x]);
        $this->fin();
    }

    public function fin() {
        $this->exit = true;
    }

    public function getExit() {
        return $this->exit;
    }

    

}