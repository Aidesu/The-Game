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
        $who->getDamage($this->strength);
    }

    public function getDamage($dmg) {
        $this->life -= $dmg;
    }

    public function dead() {
        echo $this->name . " est mort gloire au roi Arthur\n";
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
        $this->setLife(250);
        $this->setStrength(15);
        $this->setCritRate(80);
    }
    
}

class Orc extends Personnages {


    public function __construct($name) {
        parent::__construct($name);
        $this->setLife(500);
        $this->setStrength(20);
        $this->setCritRate(5);
    }
    
}

class Humain extends Personnages {


    public function __construct($name) {
        parent::__construct($name);
        $this->setLife(300);
        $this->setStrength(35);
        $this->setCritRate(50);
    }
    
}

