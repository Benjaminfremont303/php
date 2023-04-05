<?php

class guitar{
    protected static $made_in_china;
    private $type;
    private $nbr_de_corde;
    private $bois;
    private $pickup; 
    private $nbr_de_pot;

    public function __construct($t, $c, $b, $pick, $p){
        $this->type =$t;
        $this->nbr_de_corde = $c;
        $this->bois = $b;
        $this->pickup = $pick;
        $this->nbr_de_pot = $p;
    }

    public function getType(){
        return "C'est une $this->type <br>". "Avec $this->nbr_de_corde <br>". "en bois de $this->bois <br>". "elle a des micros $this->pickup <br>". "$this->nbr_de_pot potentiometre";
    }
}

$newGuitar1 = new guitar('Les Pauls', '6 cordes', 'Palownia', 'humbucker', '4 pot');
echo $newGuitar1->getType();