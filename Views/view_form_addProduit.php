<?php 
$_SESSION['view'] = "formulaireAjoutProduit";
require "view_header.php" ?>
    <main>
    <form method="post" action='?controller=boutique&action=ajouterProduit'>
        <input type='text'  name='img' placeholder="Lien de l'image"/>  <br>
        <input type='text' name = 'price' placeholder="Son prix"> <br>
        <input type='text'  name='name' placeholder="Son nom"/>  <br>
        <input type='text' name = 'quantite' placeholder="Sa quantite"> <br>
        <input type="submit" value="Ajouter produit"><br>
    </form>
    </main>
    <?php require_once "view_footer.php" ?>
</body>
</html>