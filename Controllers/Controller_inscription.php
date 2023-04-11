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
        if ( $m->Indatabase($_POST['idEtudiant']) == false){
        if (  strpos($_POST['idEtudiant'], '12') !== false && strlen($_POST['idEtudiant']) == 8 &&
            preg_match("/^[a-zA-Z\d]+$/", $_POST['nom']) && preg_match("/^[a-zA-Z\d]+$/", $_POST['prenom']) &&
            preg_match("/^[0-9]+$/", $_POST['idEtudiant'])
        ){
            $infos['idEtudiant'] = $_POST['idEtudiant'] ;
            $infos['nom'] = $_POST['nom'] ;
            $infos['prenom'] = $_POST['prenom'] ;
            if ( strlen($_POST['password']) >= 8 ){
                $options = [
                    'cost' => 12,
                ];
                $infos['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            }
            else{
                echo " 
                   <script type = 'text/javascript'>
                         alert ('Le mot de passe est trop court (8 character min)');         
                      </script>     ";
                $data = [
                    "title" => "Inscription ?",
                ];
                $this->render("inscription", $data);
            }
        }
        else{
            echo " 
                   <script type = 'text/javascript'>
                         alert ('Les données ne sont pas conformes (le numéro etudiant doit commencé par 12)');         
                      </script>     ";
            $data = [
                "title" => "Inscription ?",
            ];
            $this->render("inscription", $data);
        }
        }
        else{
            echo " 
                   <script type = 'text/javascript'>
                         alert ('Le numero etudiant est deja dans la base de donnée');         
                      </script>     ";
            $data = [
                "title" => "Inscription ?",
            ];
            $this->render("inscription", $data);
        }


        //Ajout du client dans la base
        $ajout = $m->addClient($infos);
        //Préparation de $data pour l'affichage de la vue message
        $data = [
            "title" => "Inscription ?",
        ];
        if ($ajout) {
            $data["message"] = "Le client a été ajouté à la base de donnée. Connecté vous !!";
            $this->render("form_connexion", $data);
        } else {
            $data["message"] = "Il y eu un probleme! Le client n'a pu être ajouter.";
        }
        $this->render("inscription", $data);

}
}
?>
