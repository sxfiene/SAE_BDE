<?php 
$_SESSION['view'] = 'Historique';
require_once "view_header.php"?>
   <!-- Header -->      
      
  

      <h1 class="titre">Mon Historique</h1>

    <table class ="tableau">
 
        <thead>
            <tr>
                <th>Nom du Produit</th>
                <th>Date d'achat </th>
                <th>Quantité</th>
                <th>Prix</th>
            </tr>
        </thead>


        <tbody>
            <?php foreach($listeHistorique as $liste) {?>
            <tr>
                <td><?= $liste['nom'] ?></td>
                <td><?= $liste['date'] ?></td>
                <td><?= $liste['quantite'] ?></td>
                <td><?= $liste['totalPrix'] ?></td>
            </tr>
            <?php } ?>
        </tbody>




    </table>





   
<?php require_once "view_Footer.php"?>



      <script src="../js/Header.js"></script> 
</body>
</html>