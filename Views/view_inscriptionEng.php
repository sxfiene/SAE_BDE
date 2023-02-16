<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link rel="stylesheet" href="../MVC/Content/css/InscriptionEng.css">
  

</head>
<body>
  <a href="?controller=accueil&action=homeEng"><img src="../MVC/Content/img/loup.png" class="loup"> </a> 
  <div class="bloc">
  <h1 class="cc"> Create an account </h1>
  <form method="post" action='?controller=inscription&action=sinscrire'>

    <p class="name"> Last Name <input class="inpName" type='text'  name='nom' placeholder=" Enter your Last name "/> <br/><p>

    <p class="Fname"> First Name <input class="inpFname" type='text' name = 'prenom' placeholder="Enter your First name "> <br/></p>

   <p class="StudentID"> Student ID  <input class="inpStudentID" type='password' name = 'idEtudiant' placeholder="Enter your Student ID"> <br/> </p>

   <p class="psw"> Password  <input class="inppsw" type='text' name = 'password' placeholder="Enter your Password"> <br/></p>

   <p class="formation"> Formation  <input class="inpformation" type='text' name = 'Formation' placeholder="Enter your Formation"> <br/> </p>

    <input class="submit"  type="submit" value="Submit" />
    </form>
  </div>
  <footer>
    <div class="bas">
      <p class="bdef">
        BDE IUT VILLETANEUSE
      </p>
      <p class="copy">Copyright© Stark Industries</p>
      
      <p > <a href="?controller=inscription&action=inscription"><img class="fr" src="../MVC/Content/img/FR.png"> </a> </p>
    </div>
  </footer>