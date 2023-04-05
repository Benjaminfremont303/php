<?php

class guitar{
    public $type;
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
        echo "Guitare complete";
    }

    public function getType(){
        return "c'est une $this->type";
    }
}

$newGuitar1 = new guitar('Les Pauls', '6 cordes', 'Palownia', 'humbucker', '4 pot');
var_dump($newGuitar1);
//echo $newGuitar1->type;