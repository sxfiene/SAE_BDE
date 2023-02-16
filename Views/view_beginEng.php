<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Home</title>
  <link rel="stylesheet" href="../MVC/Content/css/accueil.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>



<header>
  <div class="entete">
    <p > <a href="?controller=accueil&action=homeEng"><img src="../MVC/Content/img/loup.png" class="loup"> </a> </p>
    <p class="cata"><a href="../MVC/Content/html/catalogue.html" style="color:#FFFFFF" >Catalog</a></p>
    <div class="br">
    <ul class="menuderoulant"> 
    <li><a href="?controller=inscription&action=inscriptionEng">Sign in</a></li>
    <li><a href="#">Log in</a></li>
  </ul>
    </div>
    <p > <a href="?controller=accueil&action=home"><img src="../MVC/Content/img/FR.png" class="uk"> </a> </p> 
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

  <section>
  <div class="info">
    <p class="infor">Information</p>
  </div>
  </section>

<section>
	<div class="blockinfo">
		<p class="bdeinfo">The Student Office is open from 11am to 7.30pm* in room Q101 at the University of Villetaneuse (* under the presence of a member of the association). Purchases over 1 euro can be made with a credit card, Apple Pay payment is also accepted for purchases over 1 euro.</p>
	</div>
</section>

  <section>
  <div class="pd1">
    <p class="pd1txt">Most purchased product</p>
  </div>
  </section>

  <section>
    
    <div class="cadre-diapo">
      <img class="diapo" src="https://i0.wp.com/cafecremesport.com/wp-content/uploads/2022/05/1645635800_Comment-Trabzonspor-a-perturbe-lelite-turque-11-ans-apres-le.jpg?fit=2000%2C1388&ssl=1" alt>
      <img class="diapo" src="https://static.birgun.net/resim/haber-detay-resim/2022/05/06/trabzonspor-un-kulturel-derinligi-1011756-5.jpg" alt>
      <img class="diapo" src="./assets/public2.jpeg" alt>
      <img class="diapo" src="./assets/Jury.jpeg" alt>
      <img class="diapo" src="./assets/Tinhinane.jpg" alt>
      <img class="diapo" src="./assets/Kais.jpeg" alt>
      <img class="diapo" src="./assets/Sylla.jpeg" alt>
      <img class="diapo" src="./assets/Quentin.jpeg" alt>
      <img class="diapo" src="./assets/Oussama.jpeg" alt>
      <img class="diapo" src="./assets/remise_prix.png" alt>
      <button class="precedent" aria-label="précédent" onclick="boutons(-1)">❮</button>
      <button class="suivant" aria-label="suivant" onclick="boutons(1)">❯</button>
    </div>
    <div class=cadre-demo>
      <button class="demo" onclick="actifIndic(1)">1</button> 
      <button class="demo" onclick="actifIndic(2)">2</button> 
      <button class="demo" onclick="actifIndic(3)">3</button>
      <button class="demo" onclick="actifIndic(4)">4</button>
      <button class="demo" onclick="actifIndic(5)">5</button>
      <button class="demo" onclick="actifIndic(6)">6</button>
      <button class="demo" onclick="actifIndic(7)">7</button>
      <button class="demo" onclick="actifIndic(8)">8</button>
      <button class="demo" onclick="actifIndic(9)">9</button>
      <button class="demo" onclick="actifIndic(10)">10</button>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script>
	var diaporama = 1;
affichage(diaporama);

function boutons(n) {
  affichage(diaporama += n);
}

function actifIndic(n) {
  affichage(diaporama = n);
}

function affichage(n) {
  var i;
  var diapoImg = document.getElementsByClassName("diapo");
  var indic = document.getElementsByClassName("demo");
  if (n > diapoImg.length) {diaporama = 1}    
  if (n < 1) {diaporama = diapoImg.length}
  for (i = 0; i < diapoImg.length; i++) {
     
     diapoImg[i].style.opacity = "0";
  }
  for (i = 0; i < indic.length; i++) {
     indic[i].className = indic[i].className.replace(" numeros", "");
  }
  diapoImg[diaporama-1].style.opacity = "1";    
  indic[diaporama-1].className += " numeros";
}
</script>