<?php


session_start();
if (!empty($_SESSION['users'])) {
    require('../php/co_bdd.php');
    require('../php/function.php');
    $req = "UPDATE users SET mail = ?, lastname = ?, name = ?  WHERE id = ?";
    $req = $bdd->prepare($req);
    $req->execute(array(
        $_POST['mail'],
        $_POST['name'],
        $_POST['lastname'],
        $_POST['id']
    ));

    $user = getUser($_POST['id']);
    $_SESSION['users']['id'] = $user['id'];
    $_SESSION['users']['name'] = $user['name'];
    $_SESSION['users']['mail'] = $user['mail'];

    header('location: ../compte.php');
}
