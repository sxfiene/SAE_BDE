<?php
if ( isset($message)) echo $message;

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>ConnexionFr</title>
  <link rel="stylesheet" href="./css/connexion.css">
  <link href="https://fonts.cdnfonts.com/css/rancho" rel="stylesheet">
</head>

<body>

<header> <div class="head"> <img src="./img/LoupNoir.png" alt="Logo BDE" class="loupBde"></div> </header>

   <!--FORMULAIRE-->

<div class="formulaire"> 

    <div class ="container">
    <form method="post" action='?controller=connexion&action=login' id="form">
         
      <p class="titre"> BDE Connexion  </p>
      <input  type='text'  name='idf' placeholder="Entrez votre numéro d'étudiant" id="inpNumeroEtudiant"/>  <br>
      <input class="inpMdp" type='password' name = 'mdp' placeholder="Entre votre mot de passe"> <br>
      <input class="rectb"  type="submit" value="Se Connecter"><br>
      <p>Vous n'avez pas de compte ?</p>
      <a href="?controller=inscription&action=inscription" class="creeCompte">Crée un compte</a></br>
      <br><p> Vous avez oubliez votre Mot de Passe ?</p>
      <a href="?controller=connexion&action=mdpoublié" class="mtpOublie"> Mot de passe oublié </a></br>
      <br><a href="?controller=connexion&action=seconnecterinvite" class="seConnecter">Se connecter en tant qu'inviter</a></br>
      <a href="?controller=connexion&action=seconnecterEng"><img src="./img/uk.svg" class="fr" alt="Drapeau Anglais"></a> 
      <p id="erreur"></p>

    </form>

    <!-- OMBRES -->

<div class=" carre ombre1"></div>
<div class=" carre ombre2"></div>
<div class=" carre ombre3"></div>

</div>
</div>

<footer><img src="./img/IUT.png" alt="LOGO IUT" class="iut"></footer>

<script src="./js/connexion.js"> </script>
</body>
</html>