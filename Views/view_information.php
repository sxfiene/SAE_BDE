<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>MonCompte</title>
  <link rel="stylesheet" href="../MVC/Content/css/MonCompte.css">
  <link href="https://fonts.cdnfonts.com/css/rancho" rel="stylesheet">
                
 
</head>
<body>

  <header>
  <div class="entete">
    <p > <a href="?controller=accueil&action=home"><img src="../MVC/Content/img/loup.png" class="loup"> </a> </p>
    <p class="cata"><a href="../MVC/Content/html/catalogue.html" style="color:#FFFFFF" >Catalogue</a></p>
    <div class="br">
  <ul class="menuderoulant"> 
    <li><a href="?controller=accueil&action=info">Mon profil</a></li>
    <li><a href="?controller=connexion&action=seconnecter">Se déconnecter</a></li>
  </ul>
    </div>
    <p > <a href="?controller=accueil&action=homeEng"><img src="../MVC/Content/img/uk.svg" class="uk"> </a> </p> 
<ul>   
    <li><button id="menu-button"><img src="../MVC/Content/img/clientvert.jpg" class="clientvert"></button></li>
</ul>
 <script>
$(document).ready(function() {

  $('#menu-button').click(function() {

    $('.menuderoulant').slideToggle();

  });

});</script> 
  </div>
    </header> 



    <p class="PH1"> Mon Compte </p>



    <section>
      <div class="info">
        <p class="infor">Mes informations personnel</p>
        <p > <img src="../MVC/Content/img/user.png" class="user"></p>
      </div>
      </section>

      <section>
        <div class="info2">
          <p class="infor2">Mon historique d'achat</p>
           <p > <img src="../MVC/Content/img/base.png" class="base"></p>
        </div>
        </section>

        <section>
          <div class="info3">
            <p class="infor3">Mes points de fidélités</p>
            <p > <img src="../MVC/Content/img/cartefidelite.png" class="cartef"></p>
          </div>
          </section>

          
    
  





      <footer>

        <div class="bas">
          <p class="bdef">
            BDE IUT VILLETANEUSE
          </p>
          <p class="copy">Copyright© Stark Industries</p>
        </div>
      </footer>
      

</body>
</html>