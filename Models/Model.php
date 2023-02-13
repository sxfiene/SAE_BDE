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
        $this->bd = new PDO('mysql:host=localhost;dbname=bde','root');
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
        $requete = $this->bd->prepare('INSERT INTO Clients(idEtudiant, nom, prenom, password) VALUES (:idEtudiant, :nom, :prenom, :password)');
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

    public function getClient()
    {
        $req = $this->bd->prepare('SELECT COUNT(*) FROM Clients');
        $req->execute();
        $tab = $req->fetch(PDO::FETCH_NUM);
        return $tab[0];
    }

    public function login($login,$mdp) {
        $req = $this->bd->prepare('SELECT password, admin, tiktak from clients where idEtudiant = :id');
        $req->bindValue(":id", $login);
        $req->execute();
        $tab = $req->fetch(PDO::FETCH_NUM);
        $tab[0] = password_verify($mdp,$tab[0]);
        return $tab;
    }

    public function getProducts() {
        $req = $this->bd->prepare('SELECT * from products');
        $req->execute();
        return $req->fetchall();
    }

    public function getHistorique($login) {
        $req = $this->bd->prepare('SELECT * from historique where idEtudiant =:id');
        $req->bindValue(":id", $login);
        $req->execute();
        return $req->fetchall();
    }

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
        $req = $this->bd->prepare('update products set quantite = :quantite where id =:id');
        $req->bindValue(":id", $id);
        $req->bindValue(":quantite", $quantite);
        $req->execute();
        return (bool) $req->rowCount();
    }

    public function getInventaire()
    {
        $req = $this->bd->prepare('SELECT * FROM products');
        $req->execute();
        return $req->fetchall();
    }  

    public function ajouterProduit($infos) {
        $requete = $this->bd->prepare('INSERT INTO products(img, price, name, quantite) VALUES (:img, :price, :name, :quantite)');
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
        $req = $this->bd->prepare('SELECT * FROM clients where idEtudiant = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        return $req->fetchall();
    }
}
