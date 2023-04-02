<?php
class Controller_inscription extends Controller {
    public function action_default()
    {
        $this->action_inscription();
    }

    public function action_inscription()
    {   
        $data = [];
        $this->render("inscription", $data);
    }

    public function action_inscriptionEng()
    {   
        $data = [];
        $this->render("inscriptionEng", $data);
    }

    public function action_sinscrire() {
        $ajout = false; 
        $m = Model::getModel();
        $infos = [];
        $noms = ['nom', 'prenom', 'idEtudiant', 'password'];
        foreach ($noms as $v) {
            if (isset($_POST[$v])) {
                if($v === 'password'){
                    $_POST[$v] = password_hash($_POST[$v], PASSWORD_DEFAULT);
                }
                $infos[$v] = $_POST[$v];
            } else {
                $infos[$v] = null;
            }
        }
        //Ajout du client dans la base
        $ajout = $m->addClient($infos);
        //Préparation de $data pour l'affichage de la vue message
        $data = [
            "title" => "WORKING ?",
        ];
        if ($ajout) {
            $data["message"] = "Le client a été ajouté à la base de donnée.";
        } else {
            $data["message"] = "Il y eu un probleme! Le client n'a pu être ajouter.";
        }
        $this->render("message", $data);

}
}
?>
