<?php
require_once "view_header.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Modification du produit</title>
    <style>
        /* Style pour le formulaire */
        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        /* Style pour les messages d'erreur */
        .error {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h1>Modification du produit</h1>

<?php echo "<form action='?controller=boutique&action=confirmodif&id_produit=" . $_GET['id_produit'] . "' method='POST'>";?>
    <?php
        $m = Model::getModel();
        $tab = $m->GetProduit($_GET['id_produit']);
    ?>
    <label for="nom">Nom du produit :</label>
    <input type="text" id="nom" name="nom" value="<?php echo $tab['nom_produit']?>" required>

    <label for="description">Description :</label>
    <textarea id="description" name="description" required><?php echo $tab['desc_produit']?></textarea>


    <label for="quantite">Quantité en stock :</label>
    <input type="number" id="quantite" name="quantite" value="<?php echo $tab['stock']?>" required>

    <label for="prix">Prix unitaire (en €):</label>
    <input type="text" id="prix" name="prix" value="<?php echo $tab['prix_produit'];?>" required>

    <label for="fidelite">Pourcentage de Fidélité (en %) :</label>
    <input type="text" id="prix" name="fidelite" value="<?php echo round( $tab['pourcentage_fidelite'] * 100 ); ?>" required>


    <input type="submit" value="Enregistrer les modifications">
</form>

<style>
    /* Style pour le corps de la page */
    body {
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        margin: 0;
        padding: 0;
    }

    /* Style pour le conteneur principal */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Style pour les en-têtes */
    h1, h2 {
        text-align: center;
    }

    /* Style pour les boutons */
    button, input[type="submit"] {
        display: block;
        margin: 0 auto 20px;
    }

    /* Style pour les liens */
    a {
        color: #4CAF50;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Style pour les messages d'erreur */
    .error {
        color: red;
        font-weight: bold;
        margin-bottom: 10px;
    }
    </style>


<?php
require_once "view_Footer.php";


?>
