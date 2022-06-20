<?php

require('../php/co_bdd.php');


$req = $bdd->prepare('DELETE FROM categorie WHERE id= ?');
$req->execute(array(
    $_GET['id'],
));
header('location: ../../categories.php');
