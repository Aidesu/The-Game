<?php 


abstract class Personnages {

    private string $name;
    private int $life;
    private int $maxLife;
    private int $strength;
    private int $critRate;

    public function __construct($name) {
        $this->name = $name;
    }

    public function attack($who) {
        
        if ($this->life > 0){
            $who->getDamage($this->strength);
            $this->displayLife();
            if ($who->getLife() > 0){
                echo "\e[0;36m#  \e[0;32m". $this->name . " \e[0;35mattack ";
                usleep(500000);
                echo ".";
                usleep(500000);
                echo ".";
                usleep(500000);
                echo ".\n";
                usleep(500000);
                
                echo "\e[0;36m#  \e[0;32m". $this->name . " \e[0;35minflige \e[1;33m" . $this->strength . " \e[0;35mdegat a \e[0;32m" . $who->getName() . " \e[0;35mil lui reste \e[0;31m" . $who->getLife(). "hp \n\e[0;36m#\n";
            } else {
            $who->dead($this);
            }
        } else {
            $this->deadMessage();
        }
        

    }

    public function setMaxLife($maxLife) {
        $this->maxLife = $maxLife;
    }

    public function displayLife() {
        //echo $this->life / $this->maxLife * 100;
        echo "\e[0;36m#  \e[0;32m" .$this->name . " : ";
        if ($this->life / $this->maxLife * 100 > 80){
            echo "\e[1;35m❤❤❤❤❤\e[0m\n";
        } elseif($this->life / $this->maxLife * 100 >= 60){
            echo "\e[1;33m❤❤❤❤\e[0m\n";
        }elseif($this->life / $this->maxLife * 100 >= 40){
            echo "\e[1;31m❤❤❤\e[0m\n";
        }elseif($this->life / $this->maxLife * 100 >= 20){
            echo "\e[1;31m❤❤\e[0m\n";
        }
        elseif($this->life / $this->maxLife * 100 >= 10){
            echo "\e[1;31m❤\e[0m\n";
        }
    }

    public function getDamage($dmg) {
        $this->life -= $dmg;
    }

    public function dead($assassin) {
        echo "\e[0;36m#  \e[0;32m". $assassin->getName() . "\e[0;35m a tuer \e[0;32m" . $this->name . "\e[0;35m gloire au roi Arthur\n";
    }


    public function getName() {
        return $this->name;
    }

    public function getLife() {
        return $this->life;
    }

    public function setLife($life) {
        $this->life = $life;
    }

    public function getStrength() {
        return $this->strength;
    }

    public function setStrength($strength){
        $this->strength = $strength;
    }

    public function setCritRate($critRate) {
        $this->critRate = $critRate;
    }

    abstract public function deadMessage();

}

class Elfe extends Personnages {

    public function __construct($name) {
        parent::__construct($name);
        $this->setLife(50);
        $this->setMaxLife(50);
        $this->setStrength(15);
        $this->setCritRate(80);
    }

    public function deadMessage(){
        echo "La grâce et la sagesse de cet Elfe ". $this->getName() ." disparaissent à jamais dans les ténèbres.\n";
    }
}

class Orc extends Personnages {


    public function __construct($name) {
        parent::__construct($name);
        $this->setLife(100);
        $this->setMaxLife(100);
        $this->setStrength(20);
        $this->setCritRate(5);
    }

    public function deadMessage(){
        echo "Le rugissement de cet Orc ". $this->getName() ."s'est eteint, laissant place au silence de la mort.\n";
    }
    
}

class Humain extends Personnages {


    public function __construct($name) {
        parent::__construct($name);
        $this->setLife(75);
        $this->setMaxLife(75);
        $this->setStrength(35);
        $this->setCritRate(50);
    }

    public function deadMessage(){
        echo "Ni gloire ni fortune n'ont pu sauver cet Humain " . $this->getName() . " de sa fin tragique.";
    }
    
}

