<?php
if(!isset($_SESSION)){
    //si non demarer la session
    session_start();
 }
 //creer la session
 if(!isset($_SESSION['id_utilisateur'])){
    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['id_utilisateur'] = 0;
 }
 if(!isset($_SESSION['grade'])){
    $_SESSION['grade'] = 0;
 }
 if(!isset($_SESSION['view'])){
    $_SESSION['view'] = '';
 }

class Controller_connexion extends Controller
{
    public function action_default()
    {
        $this->action_seconnecter();
    }

    public function action_seconnecter()
    {   
        $data = ["erreur" => false,];
        $this->render("form_connexion", $data);
    }

    public function action_home()
    {   
        $data = ["erreur" => false,];
        $_SESSION['view'] = 'Accueil';
        $this->render("home", $data);
    }

    public function action_seconnecterEng()
    {   
        $data = ["erreur" => false,];
        $this->render("form_connexionEng", $data);
    }

    public function action_login() {
        $m = Model::getModel();
        $m = $m->login($_POST['idf'],$_POST['mdp']);
        $_SESSION['id_utilisateur'] = $_POST['idf'];
        $_SESSION['view'] = 'Accueil';
        if($m[0] && $m[2] === '1') {
            $_SESSION['grade'] = 1;
            $data = ["erreur" => false,];
            $this->render("home",$data);
        }
        elseif($m[0] && $m[1] === '1') {
            $_SESSION['grade'] = 1;
            $data = ["erreur" => false,];
            $this->render("home",$data);
        }
        elseif($m[0]) {
            $data = ["erreur" => false,];
            $_SESSION['grade'] = 0;
            $_SESSION['nomGrade'] = '';
            $this->render("home",$data);
        } else {
            $data = ["erreur" => true,];
            $this->render("form_connexion", $data);
        }
        
    }
}
