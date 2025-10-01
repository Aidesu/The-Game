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
        echo "\e[0;36m##############################################################################\e[0m\n";
        echo "\e[0;36m#                                                                            #\e[0m\n";
        echo "\e[0;36m#                \e[1;37m  ✦        \e[0;35m Welcome to The Game !\e[0;36m        \e[1;37m✦                 \e[0;36m #\n";
        echo "\e[0;36m#                               \e[1;37m       ▬▬ι═══════ﺤ      \e[0;36m                     #\e[0m\n";
        echo "\e[0;36m##############################################################################\e[0m\n";
        echo "\e[0;36m#\n#  \e[1;32m";
        foreach($this->combattants as $elem ){
           echo $elem->getName() . "\e[0;35m, \e[1;32m";
        }
        echo "\e[0;35m entre dans l'arene\n\e[0;36m# \e[0m    \n";
    }

    private function getId(): int {
        return array_rand($this->combattants);
    }

    public function getJoueur() {
        $id = $this->getId();
        return $this->combattants[$id];
    }

    public function tourDeJeu() {
        while(count($this->combattants) > 1){

            $fighter1 = $this->getJoueur();
            $fighter2 = $this->getJoueur();
            // verification si le meme joueur
            if ($fighter1->getName() === $fighter2->getName()){
                $fighter2 = $this->getJoueur();
            }
                $fighter1->attack($fighter2);
                $fighter2->attack($fighter1);
                $this->nettoyerMort();
            
                
        }

        if (count($this->combattants) <=1){
            $winner = $this->getJoueur();
            echo "\e[0;36m##############################################################################\n";
            echo "#\n";
            echo "#              🏆      \e[0;35m  Le grand gagnant est \e[1;32m" . $winner->getName() . "        🏆\e[0;36m\n";
            echo "\e[0;36m#\n# \e[0;35m                       Damage : \e[1;33m" . $winner->getTotalDmg(). " \n\e[0;36m#\e[0;35m                        Kills : \e[0;31m" . $winner->getTotalKills() . "\e[0;36m\n";
            echo "#\n";
        }
        
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

    public function nettoyerMort() {
       foreach($this->combattants as $elem){
            if ($elem->getLife() <= 0){
                $id = array_search($elem, $this->combattants);
                $elem->deadMessage();
                unset($this->combattants[$id]);
                echo "#  Le cadavre de " . $elem->getName() . " a ete retirer de l'arrene\n#\n";
            }
        }
        //$this->combattants = array_values($this->combattants);
    }

    public function fin() {
        $this->exit = true;
    }

    public function getExit() {
        return $this->exit;
    }

    public function setExit() {
        echo "\e[0;36m#\n";
        echo "\e[0;36m#                          \e[0;35m  Le combat est terminer\n";
        echo "\e[0;36m#\n";
        echo "\e[0;36m##############################################################################\e[0m\n";
        $this->exit = true;
    }

    

}