<?php

function randomCategory()
{
    global $bdd;
    $req = "SELECT * FROM categorie ORDER BY RAND() LIMIT 3 ";
    $req = $bdd->query($req);
    $random = $req->fetchAll();
    return $random;
}

function randomProducts()
{
    global $bdd;
    $req = "SELECT * FROM produits ORDER BY RAND() LIMIT 3 ";
    $req = $bdd->query($req);
    $randomProd = $req->fetchAll();
    return $randomProd;
}

function getAllProducts()
{
    global $bdd;
    $req = "SELECT produits.id, produits.nom, produits.contenu, produits.image, produits.prix, categorie.name, categorie.id as cid FROM produits INNER JOIN categorie ON categorie.id = produits.id_categorie";
    $req = $bdd->query($req);
    $getAllProd = $req->fetchAll();
    return $getAllProd;
}

function selectProduct()
{
    global $bdd;
    $req = "SELECT * FROM produits WHERE id = ?";
    $req = $bdd->prepare($req);
    $req->execute(array(
        $_GET['id'],
    ));
    $selectProd = $req->fetch();
    return $selectProd;
}
function getUser($id)
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $req->execute(array($id));
    $getUser = $req->fetch();
    return $getUser;
}
