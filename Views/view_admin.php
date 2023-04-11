<?php
require_once "view_header.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Interface d'administration</title>
    <style>
        /* Style pour les tableaux */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Style pour les boutons */
        button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
<h1>Interface d'administration</h1>

<h2>Stock de produits</h2>
<table>
    <tr>
        <th>Nom du produit</th>
        <th>Description du produit</th>
        <th>Quantité en stock</th>
        <th>Prix unitaire</th>
        <th>Pourcentage de fidélité</th>
        <th>Modifier</th>
    </tr>
    <?php
    $m = Model::getModel();

    $all = $m->Allproduit();
    foreach ($all as $value ) {
        echo '<tr>';
        echo '<td>' . $value['nom_produit'] . '</td>';
        echo '<td>' . $value['desc_produit'] . '</td>';
        echo '<td>' . $value['stock'] . '</td>';
        echo '<td>' . $value['prix_produit'] . "€" . '</td>';
        echo '<td>' .round( $value['pourcentage_fidelite'] * 100 ), '%'; '</td>';
        echo '<td>' . "<a href='?controller=boutique&action=modif&id_produit=" .$value['id_produit']. "'> X </a>";
        echo '</tr>';
    }

    ?>

</table>



<h2>Utilisateurs</h2>
<table>
    <tr>
        <th>Numero Etudiant</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Administrateur</th>
        <th>Modifier</th>
    </tr>
    <?php
        $m = Model::getModel();

        $all = $m->AllClient();
        foreach ($all as $value ) {
                echo '<tr>';
                echo '<td>' . $value['id_etudiant'] . '</td>';
                echo '<td>' . $value['nom'] . '</td>';
                echo '<td>' . $value['prenom'] . '</td>';
                if($value['is_admin']){
                    echo '<td>' . " Oui" . '</td>';
                }
                else{
                    echo '<td>' . "Non" . '</td>';
                    echo '<td>' . "<a href='?controller=accueil&action=usermodifadmin&id_etudiant=" .$value['id_etudiant']. "'> X </a>";
                }

                echo '</tr>';
                }

    ?>
</table>

</body>
</html>

<style>
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
    button {
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
    }

    /* Style pour les messages de succès */
    .success {
        color: green;
        font-weight: bold;
    }
</style>















<?php
require_once "view_Footer.php";


?>
