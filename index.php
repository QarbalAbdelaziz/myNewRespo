<?php include_once "connexion.php";
include_once "functions.php";
sleep(1); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
    <style type="text/css">
        body {
            margin: 0px;
            padding: 0px;
            font-family: 'Helvetica', sans-serif;

        }

        #filtres {
            margin-left: 10%;
            margin-top: 2%;
            margin-bottom: 2%;
        }
    </style>
</head>

<body>
    <div id="filtres">
        <span>Fetch results by &nbsp;</span>
        <select name="fetchval" id="fetchval">
            <option value="" disabled="" selected="">Select filtre</option>
            <?php $categories = getCategories();
            foreach ($categories as $categorie) {
            ?>
                <option value="<?php echo $categorie['idCategorie']; ?>"><?php echo $categorie['nomCategorie']; ?></option>
            <?php } ?>
        </select>
        <select name="fetchval1" id="fetchval1">
            <option value="" disabled="" selected="">Select filtre</option>
            <?php $sousCategories = getAllSousCategories();
            foreach ($sousCategories as $sousCategorie) {
            ?>
                <option value="<?php echo $sousCategorie['idSousCategorie']; ?>">
                    <?php echo $sousCategorie['nomSousCategorie']; ?></option>
            <?php } ?>
        </select>
        <select name="fetchval2" id="fetchval2">
            <option value="" disabled="" selected="">Select filtre</option>
            <?php $tailles = getTailles();
            foreach ($tailles as $taille) {
            ?>
                <option value="<?php echo $taille['idTaille']; ?>">
                    <?php echo $taille['nomTaille']; ?></option>
            <?php } ?>
        </select>

    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>idProduit</th>
                    <th>Nom produit</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Sous Catégorie</th>
                    <th>Taille</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $products = getAllProducts();
                foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?php echo $product['idProduit']; ?></td>
                        <td><?php echo $product['nom']; ?></td>
                        <td><?php echo $product['prix']; ?></td>
                        <td><?php echo $product['idCategorie']; ?></td>
                        <td><?php echo $product['idSousCategorie']; ?></td>
                        <td><?php echo $product['idTaille']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#fetchval").on('change', function() {
                    var value = $(this).val();

                    $.ajax({
                        url: "fetch.php",
                        type: "POST",
                        data: 'request=' + value,
                        beforeSend: function() {
                            $(".container").html("<span>Working...</span>");
                        },
                        success: function(data) {
                            $(".container").html(data);
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#fetchval1").on('change', function() {
                    var value = $(this).val();
                    // alert(value);
                    $.ajax({
                        url: "fetch.php",
                        type: "POST",
                        data: 'request1=' + value,
                        beforeSend: function() {
                            $(".container").html("<span>Working...</span>");
                        },
                        success: function(data) {
                            $(".container").html(data);
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#fetchval2").on('change', function() {
                    var value = $(this).val();
                    // alert(value);
                    $.ajax({
                        url: "fetch.php",
                        type: "POST",
                        data: 'request2=' + value,
                        beforeSend: function() {
                            $(".container").html("<span>Working...</span>");
                        },
                        success: function(data) {
                            $(".container").html(data);
                        }
                    });
                });
            });
        </script>
    </div>
</body>

</html>