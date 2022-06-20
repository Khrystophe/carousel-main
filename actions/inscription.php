<?php
session_start();

if (isset($_POST['mail']) && !empty($_POST['mail']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['lastname']) && !empty($_POST['lastname']) && isset($_POST['sexe']) && !empty($_POST['sexe']) && isset($_POST['password']) && !empty($_POST['password'])) {
    require('../require/co_bdd.php');

    $req = $bdd->prepare('SELECT mail FROM users WHERE mail= ?');
    $req->execute(array(
        $_POST['mail']
    ));
    $mail = $req->fetchColumn();

    if (!$mail) {

        $req = $bdd->prepare("INSERT INTO users(name,lastname, mail,password, sexe) VALUES (?,?,?,?,?)");
        $entrer = $req->execute(array(
            $_POST['name'],
            $_POST['lastname'],
            $_POST['mail'],
            password_hash($_POST['password'], PASSWORD_BCRYPT),
            $_POST['sexe'],
        ));
        if ($entrer) {
            $req2 = $bdd->prepare("SELECT * FROM users WHERE mail= ?");
            $req2->execute(array(
                $_POST['mail'],
            ));
            $user = $req2->fetch();

            $_SESSION['users']['id'] = $user['id'];
            $_SESSION['users']['mail'] = $user['mail'];
            $_SESSION['users']['name'] = $user['name'];
            $_SESSION['users']['type'] = $user['type'];
        } else {
            header('location: ../login.php?error=contactAdmin');
        }
        header('location: ../index.php?success=creation');
    } else {

        header('location: ../login.php?error=invalidAdress');
    }
} else {
    header('location: ../login.php?error=empty');
}
