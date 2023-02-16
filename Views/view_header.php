<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title><?= $_SESSION['view']?></title>
  <link rel="stylesheet" href="../MVC/Content/css/Header.css">
  <link rel="stylesheet" href="../MVC/Content/css/<?= $_SESSION['view']?>.css">
  <link href="https://fonts.cdnfonts.com/css/rancho" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="shortcut icon" href="../MVC/Content/img/loup.png" style="width: 35px;">
    

</head>
<body>

<!-- Header -->
<header class="main-head">
    
  
    <a href="?controller=connexion&action=home"><img src="../MVC/Content/img/loup.png" id="logo" alt="Mon titre"></a>
    <h1><a class="cata" href="?controller=boutique&action=catalogue">Catalogue</a></h1>
    <h1><a class="cata" href="?controller=boutique&action=historique">Historique</a></h1>
    <?php if ($_SESSION['grade'] === 1) {?>
    <h1><a class="cata" href="?controller=boutique&action=bilan">Bilan</a></h1>
    <h1><a class="cata" href="?controller=boutique&action=mensualite">Mensualite</a></h1>
    <h1><a class="cata" href="?controller=boutique&action=inventaire">Inventaire</a></h1>
    <?php }?>
      <nav>
      <?php if ($_SESSION['grade'] === 1) {?>
        <a href="?controller=boutique&action=panier"><img src="../MVC/Content/img/cadie.png" class="uk" alt="drapeau royaume uni"></a>
        <div><button class="menubouton"><img src="../MVC/Content/img/parametre.svg" class="clientvert" alt="Logo Profil"></button>
        <ul class="menuderoulant">
          <li>  <a href="?controller=accueil&action=parametre"> Paramètre</a></li>
          <li> <a href="?controller=connexion&action=seconnecter"> Se déconnecter</a></li>
        </ul>
      </div>
      </nav>
        <?php } else {?>
        <a href="#"><img src="../MVC/Content/img/uk.svg" class="uk" alt="drapeau royaume uni"></a>
        <div><button class="menubouton"><img src="../MVC/Content/img/clientvert.svg" class="clientvert" alt="Logo Profil"></button>
        <ul class="menuderoulant">
          <li>  <a href="?controller=accueil&action=info"> Mon compte</a></li>
          <li> <a href="?controller=connexion&action=seconnecter"> Se déconnecter</a></li>
        </ul>
      </div>
      </nav>
        <?php }?>
             
</header>



<script src="../MVC/Content/js/header.js"></script> 

