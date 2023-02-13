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
 if(!isset($_SESSION['nomGrade'])){
    $_SESSION['nomGrade'] = '';
 }
class Controller_accueil extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {

        // On récupère le modèle
        $m = Model::getModel();
        $data = [
            //On récupère le nombre de prix nobels
            "nb" => $m->getClient(),
        ];
        $this->render("home", $data);
    }

    public function action_homeEng()
    {

        // On récupère le modèle
        $m = Model::getModel();
        $data = [
            //On récupère le nombre de prix nobels
            "nb" => $m->getClient(),
        ];
        $this->render("homeEng", $data);
    }

    public function action_info() {
        $data = [];
        $this->render("information",$data);
    }

    public function action_parametre() {
        $data = [];
        $this->render("parametre", $data);
    }

    public function action_infor() {
        $m = Model::getModel();
        $data = [
            "info" => $m->getInfo($_SESSION['id_utilisateur']),
        ];
        $this->render("info", $data);
    }
}
