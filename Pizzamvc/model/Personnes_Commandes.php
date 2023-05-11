<?php
class personnescommandes extends commandes{

    protected int $id;
    protected int $id_personnes;
    protected int $id_commandes;

public function __construct(int $id_personnes = 0, int $id_commandes = 0, int $quantite = 0)
{ 
    parent::__construct();
    $this->id = -1;
    $this->id_personnes = $id_personnes;
    $this->id_commandes = $id_commandes;

}
protected function addCommande(int $idc){
if(!empty($_SESSION['email'])){

    $req = $this->prepare("SELECT *  FROM personnes_commandes WHERE id = :id");
    $req->bindParam(":id", $this->id);
    $req->execute();
    $existeUser= $req->fetchAll(PDO::FETCH_OBJ);

    $idpersonnes = new personnes;
    $idUser = $idpersonnes->getIdByEmail($_SESSION['email']);

if(!empty($existeUser)){
            $requete = $this->prepare("UPDATE personnes_commandes set id_personnes id_commandes WHERE id = ?");
            $param = array($idUser,$idc,$this->id);
            $requete->execute($param);
    }else{           
            $requete = $this->prepare("INSERT INTO personnes_commandes(id_personnes, id_commandes) VALUES(?,?)");     
            $param2 = array($idUser->id,$idc);
            $requete->execute($param2);
            unset($_SESSION['panier']);
            }
        }
    }
}