<?php
    require "./controller.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test MVC</title>
    <style>
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 1rem;
        }
    </style>
</head>
<body>
    <h1>Ajouter</h1>
    <form method="post">
        <input required type="text" name="addLibelle" placeholder="libelle">
        <input required type="text" name="addDescription" placeholder="description">
        <input required type="number" name="addPrix" placeholder="prix">
        <input required type="number" name="addQte" placeholder="qte">

        <select name="addStatut" required>
            <option value="En Stock">En Stock</option>
            <option value="Rupture de Stock">Rupture de Stock</option>
        </select>

        <button name="ajouter" type="submit">Ajouter</button>
    </form>

    <?php
        if (isset($_POST['ajouter'])) {
            $produit = new Produit(
                $_POST['addLibelle'],
                $_POST['addDescription'],
                $_POST['addQte'],
                $_POST['addPrix'],
                $_POST['addStatut']
            );
            Produits::ajouter($produit);
        }
    ?>

    <h1>Modifier</h1>
    <form method="post">
        <input type="number" name="modifIdentifiant" placeholder="identifiant">
        <input type="text" name="modifLibelle" placeholder="libelle">
        <input type="text" name="modifDescription" placeholder="description">
        <input type="number" name="modifPrix" placeholder="prix">
        <input type="number" name="modifQte" placeholder="qte">

        <select name="modifStatut">
            <option value="En Stock">En Stock</option>
            <option value="Rupture de Stock">Rupture de Stock</option>
        </select>

        <button name="modifier" type="submit">Modifier</button>
    </form>
    
    <h1>Tout les Produits</h1>
    <?php $produits = Produits::all() ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Libelle</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Quantite</th>
            <th>Statut</th>
            <th>Action</th>
        </tr>
        <?php foreach ($produits as $produit):?>
            <tr>
                <td><?php echo $produit['identifiant']?></td>
                <td><?php echo $produit['libelle']?></td>
                <td><?php echo $produit['description']?></td>
                <td><?php echo $produit['prix']?></td>
                <td><?php echo $produit['qte']?></td>
                <td><?php echo $produit['statut']?></td>
                <td>
                    <form method="post">
                        <input type="hidden" value="<?php echo $produit['identifiant']?>" name="prodId">
                        <button type="submit" name="supprimer">&cross;</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
    </table>

    <?php
        if (isset($_POST['modifier'])) {
            $produit = new Produit(
                $_POST['modifLibelle'],
                $_POST['modifDescription'], 
                $_POST['modifQte'], 
                $_POST['modifPrix'], 
                $_POST['modifStatut']
            );
            Produits::modifier($produit, $_POST['modifIdentifiant']);
        }
        if (isset($_POST['supprimer'])) {
            Produits::supprimer($_POST['prodId']);
        }
    ?>
</body>
</html>