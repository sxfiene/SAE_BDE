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
if($_SESSION['id_utilisateur'] !== 0) {

    if (!isset($_SESSION['admin'])) {
        $model = Model::getModel();
        if ($model->checkAdmin($_SESSION['id_utilisateur']) == true) {
            $_SESSION['admin'] = true;
        } elseif ($model->checkAdmin($_SESSION['id_utilisateur']) == false) {
            $_SESSION['admin'] = false;
        }

    }
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

        if ($_SESSION['admin'] == true){
            $data = ["erreur" => false,];
            $_SESSION['view'] = 'Accueil';
            $this->render("admin", $data);
        }
        elseif($_SESSION['admin'] == false){
            $data = ["erreur" => false,];
            $_SESSION['view'] = 'Accueil';
            $this->render("home", $data);
        }


    }

    public function action_seconnecterEng()
    {   
        $data = ["erreur" => false,];
        $this->render("form_connexionEng", $data);
    }
    public function action_mdpoublié()
    {   
        $data = ["erreur" => false,];
        $this->render("forgot", $data);
    }
    public function action_domdp(){
        //Envoie d'un email via PHPMailer a implémenter prochainement
    }
    public function action_seconnecterinvite(){
        $_SESSION['id_utilisateur'] = 'anonyme';
        $_SESSION['view'] = 'Accueil';
        $data = ["erreur" => false,];
        $this->render("home",$data);
        }
    public function action_login() {
        $m = Model::getModel();
        $model = Model::getModel();
        $m = $m->login($_POST['idf'],$_POST['mdp']);
        $_SESSION['id_utilisateur'] = $_POST['idf'];
        $_SESSION['view'] = 'Accueil';
        if($m[0] && $m[1] === '1') {
            $_SESSION['grade'] = 1;


            if( $model->checkAdmin($_SESSION['id_utilisateur']) == true){
                $_SESSION['admin'] = true;
                $data = ["Connecter en tant Admin" => false,];
                $this->render("admin",$data);
                echo $_SESSION['admin'];
            }
            else{
                $_SESSION['admin'] = false;
                echo $_SESSION['admin'];
                $data = ["Connecter en tant Utilisateur" => false,];
                $this->render("home",$data);
            }

        }
        elseif($m[0] && $m[1] === '1') {
            $_SESSION['grade'] = 1;
            if ($model->checkAdmin($_SESSION['id_utilisateur']) == true) {
                $_SESSION['admin'] = true;
                $data = ["Connecter en tant Admin" => false,];
                $this->render("admin", $data);
            } else {
                $_SESSION['admin'] = false;
                $data = ["Connecter en tant Utilisateur" => false,];
                $this->render("home", $data);
            }
        }
        elseif($m[0]) {
            $data = ["erreur" => false,];
            $_SESSION['grade'] = 0;
            $_SESSION['nomGrade'] = '';
            if( $model->checkAdmin($_SESSION['id_utilisateur']) == true){
                $_SESSION['admin'] = true;
                $data = ["Connecter en tant Admin" => false,];
                $this->render("admin",$data);
            }
            else{
                $_SESSION['admin'] = false;
                $data = ["Connecter en tant Utilisateur" => false,];
                $this->render("home",$data);

        }
        }

            else {
            $data = ["erreur" => true,];
            echo 'ERROR 404';
            $this->render("form_connexion", $data);
        }
        
    }
}
