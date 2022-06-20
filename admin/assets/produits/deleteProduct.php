<?php


require('../php/co_bdd.php');


$requete = $bdd->prepare('SELECT * FROM produits WHERE id = ?');
$requete->execute(array(
    $_GET['id'],
));
$user = $requete->fetch();

unlink('../uploads/' . $user['image']);

$req = $bdd->prepare('DELETE FROM produits WHERE id= ?');
$req->execute(array(
    $_GET['id'],
));
header('location: ../../products.php');
