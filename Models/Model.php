<?php

class Model
{
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {
        $dsn = 'pgsql:host=localhost;dbname=sae_rework'; 
        $login = 'postgres'; 
        $mdp = 'Wiggle13';
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function addClient($infos) : bool
    {
        //Préparation de la requête
        //$requete = $this->bd->prepare('INSERT INTO nobels (year, category, name, birthdate, birthplace, county, motivation) VALUES (:year, :category, :name, :birthdate, :birthplace, :county, :motivation)');
        $requete = $this->bd->prepare("INSERT INTO utilisateur(id_etudiant, nom, prenom, password, is_admin, created_at) VALUES (:idEtudiant, :nom, :prenom, :password, false , current_date)");
        //Remplacement des marqueurs de place par les valeurs
        //$marqueurs = ['year', 'category', 'name', 'birthdate', 'birthplace', 'county', 'motivation'];
        $marqueurs = ['idEtudiant', 'nom', 'prenom', 'password'];

        foreach ($marqueurs as $value) {
            $requete->bindValue(':' . $value, $infos[$value]);
        }

        //Exécution de la requête
        $requete->execute();

        return (bool) $requete->rowCount();
    }
    public function Indatabase($id){
        $req = $this->bd->prepare('SELECT * FROM Utilisateur WHERE id_etudiant = :idd');
        $req->bindValue( 'idd', $id);
        $req->execute();
        return (bool) $req->rowCount();
    }


    public function getClient()
    {
        $req = $this->bd->prepare('SELECT COUNT(*) FROM Utilisateur');
        $req->execute();
        $tab = $req->fetch(PDO::FETCH_NUM);
        return $tab[0];
    }
    public function AllClient(){
        $req = $this->bd->prepare('SELECT * FROM Utilisateur');
        $req->execute();
        $tab = $req->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }
    public function Allproduit(){
        $req = $this->bd->prepare('SELECT * FROM Inventaire');
        $req->execute();
        $tab = $req->fetchAll(PDO::FETCH_ASSOC);
        return $tab;
    }
    public function GetProduit($id){
        $req = $this->bd->prepare('SELECT * FROM Inventaire where id_produit=:id');
        $req->bindValue( 'id', $id);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public function updateProduit($tab){
        $req = $this->bd->prepare('UPDATE Inventaire SET nom_produit=:np , desc_produit=:dp , stock=:s , prix_produit=:pp , pourcentage_fidelite=:pf  WHERE id_produit=:ip');
        $req->bindValue( 'np', $tab['nom']);
        $req->bindValue( 'ip', $tab['idprod']);
        $req->bindValue( 'dp', $tab['description']);
        $req->bindValue( 's', $tab['quantite']);
        $req->bindValue( 'pp', $tab['prix']);
        $req->bindValue( 'pf', $tab['fidelite']);
        $req->execute();
        return (bool) $req->rowCount();
    }
    public function checkAdmin($id){

        $req = $this->bd->prepare('SELECT is_admin FROM Utilisateur where id_etudiant=:id');
        $req->bindValue( 'id', $id);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res['is_admin'];
    }
    public function login($login,$mdp) {
        $req = $this->bd->prepare('SELECT password, is_admin from utilisateur where id_etudiant = :id');
        $req->bindValue(":id", $login);
        $req->execute();
        $tab = $req->fetch(PDO::FETCH_NUM);
        $tab[0] = password_verify($mdp,$tab[0]);
        return $tab;
    }

    public function getProducts() {
        $req = $this->bd->prepare('SELECT * from inventaire');
        $req->execute();
        return $req->fetchall();
    }

    /**
     * Méthode permettant de récupérer un l'historique d'un utilisateur. A FAIRE AVEC LA BDD QUAND ON AURA LE TEMPS
     */

    //public function getHistorique($login) {
      //  $req = $this->bd->prepare('SELECT * from historique where idEtudiant =:id');
        //$req->bindValue(":id", $login);
        //$req->execute();
        //return $req->fetchall();
    //}

    public function addProduitHistorique($infos)
    {
        //Préparation de la requête
        //$requete = $this->bd->prepare('INSERT INTO nobels (year, category, name, birthdate, birthplace, county, motivation) VALUES (:year, :category, :name, :birthdate, :birthplace, :county, :motivation)');
        $requete = $this->bd->prepare('INSERT INTO historique(idEtudiant, quantite, totalPrix, nom) VALUES (:id, :quantite, :totalPrix, :nom)');
        //Remplacement des marqueurs de place par les valeurs
        //$marqueurs = ['year', 'category', 'name', 'birthdate', 'birthplace', 'county', 'motivation'];
        
        $marqueurs = ["id", "quantite",  "totalPrix", "nom"];
        foreach ($marqueurs as $value) {
            $requete->bindValue(':' . $value, $infos[$value]);
        }

        //Exécution de la requête
        $requete->execute();
        return;
    }   
    
    public function getBilan()
    {
        $req = $this->bd->prepare('SELECT * from historique');
        $req->execute();
        return $req->fetchall();
    }    

    public function getMensualite()
    {
        $req = $this->bd->prepare('SELECT * FROM historique WHERE month(date) = month(CURRENT_TIMESTAMP)');
        $req->execute();
        return $req->fetchall();
    }  

    public function quantite($id, $quantite) {
        $req = $this->bd->prepare('update inventaire set stock = :quantite where id_produit =:id');
        $req->bindValue(":id", $id);
        $req->bindValue(":quantite", $quantite);
        $req->execute();
        return (bool) $req->rowCount();
    }

    public function getInventaire()
    {
        $req = $this->bd->prepare('SELECT * FROM inventaire');
        $req->execute();
        return $req->fetchall();
    }  

    public function ajouterProduit($infos) {
        $requete = $this->bd->prepare('INSERT INTO inventaire(id_produit, nom_produit, desc_produit, stock, prix_produit, "pourcentage_fidelite") VALUES (:id, :nom, :desc, :stock, :prix, :pourcentage)');
        //Remplacement des marqueurs de place par les valeurs
        //$marqueurs = ['year', 'category', 'name', 'birthdate', 'birthplace', 'county', 'motivation'];
        $marqueurs = ["img", "price", "name", "quantite"];

        foreach ($marqueurs as $value) {
            $requete->bindValue(':' . $value, $infos[$value]);
        }

        //Exécution de la requête
        $requete->execute();

        return (bool) $requete->rowCount();
    }

    public function getInfo($id) {
        $req = $this->bd->prepare('SELECT * FROM utilisateur where id_etudiant = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        return $req->fetchall();
    }
}
