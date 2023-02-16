<?php 
$_SESSION['view'] = 'Historique';
require_once "view_header.php"?>
   <!-- Header -->      
      
  

      <h1 class="titre">Inventaire</h1>
      <a href="?controller=boutique&action=addProduit" class="link">Ajouter un produit<span></span></a>
    <table class ="tableau">
 
        <thead>
            <tr>
                <th>Nom du Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Changer la quantite</th>
            </tr>
        </thead>


        <tbody>
            <?php foreach($inventaire as $liste) {?>
            <tr>
                <td><?= $liste['name'] ?></td>
                <td><?= $liste['quantite'] ?></td>
                <td><?= $liste['price'] ?></td>
                <td>
                    <form method="post" action='?controller=boutique&action=quantite&id=<?= $liste['id'] ?>'>
                        <input type='text' name = 'quantite' placeholder="Sa quantité"> <br>
                        <input type="submit" value="Changer la quantite"><br>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>


    </table>





   
<?php require_once "view_Footer.php"?>



      <script src="../js/Header.js"></script> 
</body>
</html>