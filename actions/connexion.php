<?php
session_start();

if (isset($_POST['mail']) && !empty($_POST['mail']) && isset($_POST['password']) && !empty($_POST['password'])) {


    require('../require/co_bdd.php');

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $req = $bdd->prepare('SELECT * FROM users WHERE mail = ?');
    $req->execute([$mail]);
    $user = $req->fetch();

    if ($user) {

        if (password_verify($password, $user['password'])) {

            $_SESSION['users']['id'] = $user['id'];
            $_SESSION['users']['mail'] = $user['mail'];
            $_SESSION['users']['name'] = $user['name'];
            $_SESSION['users']['lastname'] = $user['lastname'];
            header('location: ../index.php?success=connect');
        } else {
            header('location: ../login.php?error=password');
        }
    } else {
        header('location: ../login.php?error=nonexist');
    }
} else {
    header('location: ../login.php?error=empty');
}
