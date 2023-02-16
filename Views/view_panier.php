<?php 
if (isset($_GET['del'])) { 
    $id_del = $_GET['del'];
    unset($_SESSION['panier'][$id_del]);
}
$_SESSION['view'] = "Panier";
require_once "view_header.php";
?>  
    <main>
    <a href="?controller=boutique&action=listeProduit" class="link">catalogue</a>
    <center>
    <section>
        <table class="panier">
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php 
            $ids = array_keys($_SESSION['panier']);
            $prix = 0;
            foreach($listeProduits as $p):?>
            
            <?php if (in_array($p['id'], $ids)) { ?>
            
            <tr>
                <td><img src="../MVC/Content/img/<?=$p['img']?>"></td>
                <td><?=$p['name']?></td>
                <td><?=$p['price']?> euros</td>
                <td><?= $_SESSION['panier'][$p['id']]?></td>
                <td><a href="?controller=boutique&action=panier&del=<?=$p['id']?>"><img src="../MVC/Content/img/delete.png"></a></td>
            </tr>
            <?php $prix = $prix + ($p['price'] * $_SESSION['panier'][$p['id']]); } ?> 
            <?php endforeach ?> 
            <tr class="total">
                <th>Total : <?= $prix ?> euros</th>
            </tr>
        </table>
    </section>
    <form method="post" action='?controller=boutique&action=achat&total=<?= $prix ?>' id="form">
         
      <p class="titre"> Numéro étudiant de l'acheteur </p>
      <input class="inpMdp" type='text' name = 'idf' placeholder="numéro étudiant"> <br>
      <input class="rectb"  type="submit" value="Payer"><br>

    </form>
    </center>
    </main>
    <?php require_once "view_Footer.php"?>
</body>
</html>