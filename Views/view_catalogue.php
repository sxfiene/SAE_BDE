<?php 
require_once "view_header.php"?>
    <?php if($_SESSION['grade'] === 1){?>
        <a href="?controller=boutique&action=panier" class="link">Panier<span><?= array_sum($listePanier) ?></span></a>
    <?php } ?>
    <section class="products_list">
        <?php foreach($listeProduits as $p): ?>
        <form method="post" action='' class="product">
            <div class="image_product">
                <img src="../MVC/Content/img/<?=$p['img']?>">
            </div>
            <div class="content">
                <h4 class="name"><?=$p['name']?></h4>
                <h2 class="price"><?=$p['price']?> €</h2>
                <?php if($_SESSION['grade'] === 1){?>
                <a href="?controller=boutique&action=listeProduit&id=<?=$p['id']?>" class="id_product">Ajouter au panier</a> 
                <?php } ?>
            </div>
        </form>  
        <?php endforeach ?> 
    </section>
    <?php require_once "view_Footer.php";?>
</body>
</html>