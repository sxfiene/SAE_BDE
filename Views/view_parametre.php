<?php 
$_SESSION['view'] = 'MonProfil';
require "view_header.php"?>
    <main>
      <section>
        <h1>Parametre</h1>
        <div class="grandDiv">
          <div class="div1">
            <a href="?controller=accueil&action=infor">
              <img src="../MVC/Content/img/user.png" alt="mon profil">
            </a>
            <p>Mes informations personnelles</p>
          </div>
          <div class="div2">
            <a href="?controller=boutique&action=bilan">
              <img src="../MVC/Content/img/bdd.png" alt="Historique">
            </a>
            <p> Historique des ventes </p>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <div class="footer-contenu">
        <div class="footer-contacte">
          <h3>Nous contacter</h3>
          <ul class="liste-contacte">
            <li>99 Av. Jean Baptiste Clément</li>
            <li>93430 Villetaneuse</li>
            <li>06 58 30 11 95</li>
            <li>bde.iut.villetaneuse@gmail.com</li>
          </ul>
        </div>
        <div class="footer-reseau">
          <h3> Réseaux sociaux </h3>
          <ul class="liste-reseau">
            <li>
              <a href="https://www.instagram.com/bdeup13/">
                <img src="../MVC/Content/img/instagram.svg" class="insta" alt="logo istagram">
              </a>
            </li>
            <li>
              <a href="https://www.tiktok.com/@bdeup13?_t=8XeqIcUP8XF&_r=1&fbclid=PAAaZ_noPD2puYIRo487qGeJtzZwcnzErIxAWR9LAVAhEGcoxbvmwk3WS5_f0">
                <img src="../MVC/Content/img/tiktok.svg" class="tiktok" alt="logo tiktok">
              </a>
            </li>
          </ul>
        </div>
        <div class="footer-document">
          <h3> Documents offciels </h3>
          <ul class="liste-document">
            <li>
              <a href="../MVC/Content/html/MentionLegal.html"> Mention légales </a>
            </li>
            <li>
              <a href="../MVC/Content/html/Charte.html"> Charte </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="ah">
        <h1 class='copyright'>Copyright&#169;Stark Industries</h1>
      </div>
    </footer>
    <script src="../MVC/Content/js/Header.js"></script>
  </body>
</html>