<?php

function getAllProducts()
{
    global $bdd;
    $req = "SELECT produits.id, produits.nom, produits.contenu, produits.image, produits.prix, categorie.name, categorie.id as cid FROM produits INNER JOIN categorie ON categorie.id = produits.id_categorie";
    $req = $bdd->query($req);
    $getAllProd = $req->fetchAll();
    return $getAllProd;
}

function getCategory()
{
    global $bdd;
    $req = $bdd->query('SELECT * FROM categorie');
    $categorie = $req->fetchAll();
    return $categorie;
}


function getClients()
{
    global $bdd;
    $req = $bdd->query('SELECT * FROM users');
    $clients = $req->fetchAll();
    return $clients;
}
