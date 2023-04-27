<?php
// On récupère l'objet "base de données"
require_once "db.php";
require_once "commandes.php";

// Par convention, on met la première lettre d'une classe en majuscule
class Personnes extends DB
{
    /*
        Les attributs sont en "protected" car la classe risque d'être réutilisée par une autre
     */
    protected string $nom;
    protected string $prenom;
    protected string $adresse;
    protected string $email;
    protected string $pass;
    protected int $fidelite;

    /*  On définit une constructeur qui peut affecter tous les attributs en une seule fois
        Remarque : dans la mesure où toute table a un id principal,  $id est défini dans BDD
        Des valeurs "par défaut" sont affectées aux paramètres pour que PDO puisse appeller le 
        constructeur sans aucun paramètre puis affecter des valeurs en fonction de la base de données
        La valeur de fidélité est -1 car c'est la valeur avant l'attribution d'une carte de fidélité
        La valeur de id est -1 afin que cet id ne soit pas présent dans la base
    */
    public function __construct(string $nom = "", string $prenom = "", string $adresse = "", string $email = "", string $pass = "")
    {
        parent::__construct();
        $this->id = -1;
        $this->fidelite = -1;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->pass = $pass;
    }

    /*  Cette fonction  statique est en fait un "faux" constructeur
        Elle permet de construire un objet Personne depuis la base de données
        Si la personne idezntifiée par l'id passé en paramètren'existe pas 
        dans la base de données, c'est un objet vide qui sera alors retourné 
    */
    public static function getById(int $id)
    {
        // On créé une personne "vide"
        $personnes = new Personnes();


        // On créé une requête
        $requete = $personnes->prepare("SELECT * FROM personnes where id=:id");

        // On ajoute le paramètre "id"
        $requete->bindParam(":id", $id);

        // On exécute la requête
        $requete->execute();

        // On récupère l'ensemble des résultats
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Personnes');
        $resultat = $requete->fetch();

        // Si il y a un résultats, on retourne ce résultat
        if ($resultat) {
            return $resultat;
        } else {
            $personnes->setNom("L'id $id n'existe pas ");
            return $personnes;
        }
    }

    public static function getByEmail(string $email, string $pass)
    {
        $personnes = new Personnes();
        $requete = $personnes->prepare("SELECT * FROM personnes where email=:email");
        $requete->bindParam(":email", $email);
        $requete->execute();
        // On récupère l'ensemble des résultats
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Personnes');
        $resultat = $requete->fetch();
        // Si il y a un résultats, on retourne ce résultat
        if ($resultat) {
            // On contrôle le mot de passe
            $verif = password_verify($pass, $resultat->pass);
            if ($verif) {
                $_SESSION['nom_personnes'] = $resultat->nom;
                $_SESSION['prenom_personnes'] = $resultat->prenom;
                $_SESSION['email'] = $resultat->email;
                return $resultat;
            }
            else {
                $personnes->setNom("L'email: $email ou le mot de passe érroné ");
                return $personnes;
            }
        } else {
            $personnes->setNom("L'email: $email ou le mot de passe érroné ");
            return $personnes;
        }
    }


    /*  On définit l'ensemble des "set" pour toutes les colonnes pour lequelles c'est utile
        Le password mémorisé ici n'est pas celui qui se trouvera en base de données
        il est seulement temporaire pour pouvoir créer les nouveaux enregistrements.
        L'id ne sera jamais "forcé", il sera récupérable via le get, mais aucun "set" n'est utile.
    */
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
    }
    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setPass(string $pass)
    {
        $this->pass = $pass;
    }
    public function setFidelite(int $fidelite)
    {
        $this->fidelite = $fidelite;
    }

    /*  On définit l'ensemble des "get" pour toutes les colonnes pour lequelles c'est utile
        Le mot de passe étant, en base de données, hashé, il est inutile de le mémoriser
        dans l'objet car sa valeur hashée va changer systématiquement.
        C'est uniquement lors de la connexion que sa valeur sera demandée afin de permettre
        le contrôle de données
        Contrairement au "set", il peut être utile de récupérer l'id, par exemple pour identifier 
        la personne dans un formulaire
    */
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getFidelite()
    {
        return $this->fidelite;
    }
    public function getId()
    {
        return $this->fidelite;
    }

    public function save()
    {
        // L'id et l'email doivent être uniques, donc un verifie s'ils existent déjà
        $requete = $this->prepare("SELECT id FROM personnes WHERE email=:email or id=:id");
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Personnes');

        $requete->bindParam("email", $this->email, PDO::PARAM_STR);
        $requete->bindParam("id", $this->id, PDO::PARAM_INT);
        $requete->execute();

        // On exécute la requête pour savoir si la personne existe déjà dans la base
        $resultat = $requete->fetch();
        if ($resultat) {
            /*  On fait un update en fonction de l'id récupéré
                Ni l'adresse email ni l'id ne doivent pas être modifiées ici
                Une fonction spécifique sera écrite pour modifier l'email
            */
            $this->id = $resultat->id;
            echo "id = $this->id";
            $query = $this->prepare("UPDATE personnes set nom=:nom, prenom=:prenom, adresse=:adresse, fidelite=:fidelite where id=:id");
            $query->bindParam(":id", $resultat->id);
        } else {
            // On hashe le pass et on l'insère
            $passH = password_hash($this->pass, PASSWORD_DEFAULT);
            $query = $this->prepare("INSERT INTO personnes(nom, prenom, adresse, email, pass, fidelite) VALUES (:nom, :prenom, :adresse, :email, :pass, :fidelite)");
            $query->bindParam("pass", $passH, PDO::PARAM_STR);
            $query->bindParam("email", $this->email, PDO::PARAM_STR);
        }

        // Ces paramètres sont identiques pour l'insertion ou la modification
        $query->bindParam("nom", $this->nom, PDO::PARAM_STR);
        $query->bindParam("prenom", $this->prenom, PDO::PARAM_STR);
        $query->bindParam("adresse", $this->adresse, PDO::PARAM_STR);
        $query->bindParam("fidelite", $this->fidelite, PDO::PARAM_STR);
        $query->execute();
    }

    function getCommandes(int $nombre = -1, int $debut = -1)
    {
        $strRequete = "select commandes.* from commandes
        inner join personnes_commandes on id_commandes = commandes.id
        where id_personnes=:id ORDER BY date DESC";
        if ($nombre > 0) {
            $strRequete .= "limit $nombre";
            if ($debut > 0) {
                $strRequete .= ", $debut";
            }
        }
        $requete = $this->prepare($strRequete);
        $requete->bindParam("id", $this->id, PDO::PARAM_INT);
        $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Commandes');
        $requete->execute();
        $result = $requete->fetchAll();
        return $result;
    }
}



