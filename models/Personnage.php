<?php 


abstract class Personnages {

    private string $name;
    private int $life;
    private int $strength;
    private int $critRate;

    public function __construct($name) {
        $this->name = $name;
    }

    public function attack($who) {
        
        if ($this->life > 0){
            $who->getDamage($this->strength);
            if ($who->getLife() > 0){
                echo "#  ". $this->name . " attack ";
                usleep(500000);
                echo ".";
                usleep(500000);
                echo ".";
                usleep(500000);
                echo ".\n";
                usleep(500000);
                
                echo "#  ". $this->name . " inflige " . $this->strength . " degat a " . $who->getName() . " il lui reste " . $who->getLife(). "hp \n#\n";
            } else {
            $who->dead($this);
            }
        } else {
            echo "je suis mort";
        }
        

    }

    public function getDamage($dmg) {
        $this->life -= $dmg;
    }

    public function dead($assassin) {
        echo $assassin->getName() . " a tuer " . $this->name . " gloire au roi Arthur\n";
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

}

class Elfe extends Personnages {

    public function __construct($name) {
        parent::__construct($name);
        $this->setLife(50);
        $this->setStrength(15);
        $this->setCritRate(80);
    }
}

class Orc extends Personnages {


    public function __construct($name) {
        parent::__construct($name);
        $this->setLife(100);
        $this->setStrength(20);
        $this->setCritRate(5);
    }
    
}

class Humain extends Personnages {


    public function __construct($name) {
        parent::__construct($name);
        $this->setLife(75);
        $this->setStrength(35);
        $this->setCritRate(50);
    }
    
}

