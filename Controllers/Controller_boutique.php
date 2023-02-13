<?php
if(!isset($_SESSION)){
   //si non demarer la session
   session_start();
}
//creer la session
if(!isset($_SESSION['panier'])){
   //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
   $_SESSION['panier'] = array();
}
if(!isset($_SESSION['view'])){
    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['view'] = '';
 }

if(!isset($_SESSION['grade'])){
    $_SESSION['grade'] = 0;
 }

 if(!isset($_SESSION['achat'])){
    $_SESSION['achat'] = array();
 }
class Controller_boutique extends Controller
{
    public function action_default()
    {
        $this->action_listeProduit();
    }

    public function action_listeProduit()
    {   
        //récupération de l'id dans le lien
        if(isset($_GET['id'])){//si un id a été envoyé alors :
        $id = $_GET['id'] ;
        //ajouter le produit dans le panier ( Le tableau)
        if(isset($_SESSION['panier'][$id])){// si le produit est déjà dans le panier
            $_SESSION['panier'][$id]++; //Représente la quantité 
        }else {
            //si non on ajoute le produit
            $_SESSION['panier'][$id]= 1 ;
        }
        //redirection vers la page index.php
        }
        $m = Model::getModel();
        $data = [
            "listePanier" => $_SESSION['panier'],
            "listeProduits" => $m->getProducts(),
        ];
        $_SESSION['view'] = "Catalogue";
        $this->render("catalogue", $data);
    }

    public function action_panier() {
        $data = [];
        $m = Model::getModel();
        $data = [
            "listeProduits" => $m->getProducts(),
        ];
        $this->render("panier", $data);
    }

    public function action_historique() {
        $data = [];
        $m = Model::getModel();
        $data = [
            "listeHistorique" => $m->getHistorique($_SESSION["id_utilisateur"]),
        ];
        $this->render("historique", $data);
    }

    public function action_achat() {
        $data = [];
        $m = Model::getModel();
        $produits = $_SESSION['panier'];
        $noms = "";
        $quantite = "";
        foreach($produits as $liste => $p) {
            $noms = $noms . (string)$liste . " ";
            $quantite = $quantite . (string)$p . " ";
        }
        $noms = rtrim($noms, ",");
        $quantite = rtrim($quantite, ",");
        $infos = [ 
             "id" => $_POST['idf'],
             "quantite" => $quantite,
             "totalPrix" => $_GET["total"],
             "nom" => $noms,
        ];
        $m = $m->addProduitHistorique($infos);
        unset($_SESSION['panier']) ;
        $this->render("achat", $data);
    }

    public function action_bilan() {
        $data = [];
        $m = Model::getModel();
        $data = ["bilan" => $m->getBilan()];
        $this->render("bilan", $data);
    }
    
    public function action_mensualite() {
        $data = [];
        $m = Model::getModel();
        $data = ["mensualite" => $m->getMensualite()];
        $this->render("mensualite", $data);
    }

    public function action_inventaire() {
        $data = [];
        $m = Model::getModel();
        $data = ["inventaire" => $m->getInventaire()];
        $this->render("inventaire", $data);
    }

    public function action_quantite() {
        $data = [];
        $ajout = false;
        $m = Model::getModel();
        $data = [
            "title" => "Quantité du produit changer ?",
            ];
        $ajout = $m->quantite($_GET['id'], $_POST['quantite']);
        if ($ajout) {
            $data["message"] = "La quantité du produit dans l'inventaire a bien changer.";
        } else {
            $data["message"] = "Il y eu un probleme! La quantité du produit n'a pu être changer.";
        }
        $this->render("message", $data);
    }

    public function action_addProduit() {
        $data = [];
        $this->render("form_addProduit", $data);
    }

    public function action_ajouterProduit() {
        $ajout = false; 
        $m = Model::getModel();
        $infos = [];
        $noms = ["img", "price", "name", "quantite"];
        foreach($noms as $v) {
            $infos[$v] = $_POST[$v];
        }
        $ajout = $m->ajouterProduit($infos);
        //Préparation de $data pour l'affichage de la vue message
        $data = [
            "title" => "Produit ajouter",
        ];
        if ($ajout) {
            $data["message"] = "Le produit a été ajouté à la base de donnée.";
        } else {
            $data["message"] = "Il y eu un probleme! Le produit n'a pu être ajouter.";
        }
        $this->render("message", $data);
    }
}
