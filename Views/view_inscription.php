
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>InscriptionFr</title>
  <link rel="stylesheet" href="../MVC/Content/css/Inscription.css">
  <link href="https://fonts.cdnfonts.com/css/rancho" rel="stylesheet">
</head>
<body>


  <header> <div class="head"> <img src="../MVC/Content/img/LoupNoir.png" alt="Logo BDE" class="loupBde"></div> </header>

  <!--FORMULAIRE-->

  <div class="formulaire"> 
    <div class ="container">
      <form method="post" action="../php/controller.php" id="form">
  
          <p>BDE Inscription </p>
  
          <input type='text'  name='nom' placeholder="Entrez votre Nom" id="inpNom"/> <br>
          <input  type='text' name = 'prenom' placeholder="Entrez votre Prénom" id="inpPrenom"> <br>
          <input  type='text' name = 'idEtudiant' placeholder="Entrez votre NuméroID" id="inpNumeroEtudiant"> <br>
          <input  type='password' name = 'password' placeholder="Entrez votre Mot de passe" id="inpmtp"> <br>
          <input class="valider"  type="submit" value="Valider" /><br>
           <a href="?controller=inscription&action=inscriptionEng"><img src="../MVC/Content/img/uk.svg" class="uk" alt="Drapeau Anglais"></a> 
           <p id="erreur"></p>
    
 
    
        </form>

<!-- OMBRES -->
<div class=" carre ombre1"></div>
<div class=" carre ombre2"></div>
<div class=" carre ombre3"></div>
</div>
</div>

<footer><img src="../MVC/Content/img/IUT.png" alt="LOGO IUT" class="iut"></footer>


<script src="../MVC/Content/js/Inscription.js"> </script>
</body>
</html>