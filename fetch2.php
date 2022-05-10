<?php
include "connexion.php";
if (isset($_POST['request2'])) {
    $request2 = $_POST['request2'];
    $query = "SELECT * FROM produits WHERE idTaille=$request2";
    $query_run = $cnx->query($query);
    $query_result = $query_run->fetchAll();
    $count = count($query_result);
}
?>

<table class="table">
    <?php if ($count) { ?>
        <thead>
            <tr>
                <th>idProduit</th>
                <th>Nom produit</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Sous Catégorie</th>
                <th>Taille</th>
            </tr>
        <?php } else {
        echo "Aucun produit trouvé!";
    } ?>
        </thead>
        <tbody>
            <?php
            foreach ($query_result as $row) {
            ?>
                <tr>
                    <td><?php echo $row['idProduit']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['prix']; ?></td>
                    <td><?php echo $row['idCategorie']; ?></td>
                    <td><?php echo $row['idSousCategorie']; ?></td>
                    <td><?php echo $row['idTaille']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
</table>
