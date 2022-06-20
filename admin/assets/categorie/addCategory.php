<?php

require('../php/co_bdd.php');


$req = $bdd->prepare('INSERT INTO categorie (name) VALUES (?)');
$req->execute(array(
    $_POST['name'],
));
header('location: ../../categories.php');
