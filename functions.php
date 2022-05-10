<?php

function getAllProduits()
{

    // 1 - connexion 

    include "connexion.php";

    // 2- création de la requette 

    if (isset($_GET['idCategorie'])) {

        $requette = "SELECT * FROM produits where idCategorie=$_GET[idCategorie]";

        // 3- execution de la requette 

        $resultat = $cnx->query($requette);

        // 4- resultat de la requette 

        $produits = $resultat->fetchAll();

        return $produits;
    }
}

function getAllSousCategories()
{
    // 1 - connexion 

    include "connexion.php";

    // 2- création de la requette 

    $SousCategories = "SELECT * FROM souscategorie";

    // 3- execution de la requette 

    $SousCategories_run = $cnx->query($SousCategories);

    // 4- resultat de la requette 

    $SousCategories_result = $SousCategories_run->fetchAll();

    return $SousCategories_result;
}



function getCategories()
{
    // 1 - connexion 

    include "connexion.php";

    // 2- création de la requette 

    $categories = "SELECT * FROM categorie";

    // 3- execution de la requette 

    $categories_run = $cnx->query($categories);

    // 4- resultat de la requette 

    $resultat_categories = $categories_run->fetchAll();

    return $resultat_categories;
}

function getAllProducts()
{

    // 1 - connexion 

    include "connexion.php";

    $requette = "SELECT * FROM produits";

    // 3- execution de la requette 

    $resultat = $cnx->query($requette);

    // 4- resultat de la requette 

    $produits = $resultat->fetchAll();

    return $produits;
}

function getProduct($id)
{
    // 1 - connexion 

    include "connexion.php";

    $requette = "SELECT * FROM produits where idProduit='$id'";

    // 3- execution de la requette 

    $resultat = $cnx->query($requette);

    // 4- resultat de la requette 

    $produit = $resultat->fetch();

    return $produit;
}

function getTailles(){
    // 1 - connexion 

    include "connexion.php";

    $requette = "SELECT * FROM tailles";

    // 3- execution de la requette 

    $resultat = $cnx->query($requette);

    // 4- resultat de la requette 

    $tailles = $resultat->fetchAll();

    return $tailles;
}
