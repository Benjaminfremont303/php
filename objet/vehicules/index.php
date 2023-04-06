<?php
class Personne
{
    public $nom;
    public $prenom;
    public $datedenaissance;

    public function __construct($nom, $prenom, $datedenaissance)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->datedenaissance = $datedenaissance;
    }
}
class Employe extends Personne
{
}
class Vehicule
{
    public $const;
    public $immatriculation;
    public $marque;
    public $nbRoues;
    public $conducteur;

    public function __construct($const, $immatriculation, $marque, $nbRoues)
    {
        $this->const = $const;
        $this->immatriculation = $immatriculation;
        $this->marque = $marque;
        $this->nbRoues = $nbRoues;
    }
}

class Voiture extends Vehicule
{
    public function __construct($const, $immatriculation, $marque)
    {
        parent::__construct($const, $immatriculation, $marque, 4);
    }
    public function conduit($employe)
    {
        $this->conducteur = $employe;
    }
}

?>
<html>

<body>
    <?php
    $uneVoiture = new Voiture("STELANTIS", "cd258fg", "Citroen");
    $PremierEmploye = new Employe("Debaisieux", "Paolo", "03082003");
    $uneVoiture->conduit($PremierEmploye);
    var_dump($uneVoiture);
    ?>
</body>

</html>