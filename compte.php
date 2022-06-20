<?php
$page = 'compte';
session_start();


if (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
    require('./require/co_bdd.php');
    require('./require/head.php');
    require('./actions/function.php');

    $getUser = getUser($_SESSION['users']['id']);


?>

    <div class="container">
        <h1>Mon compte</h1>
        <form action="./dashboard/editUser.php" method="post">
            <input type="hidden" value="<?= $getUser['id'] ?>" name="id">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $getUser['mail'] ?>" name="mail">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $getUser['name'] ?>" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $getUser['lastname'] ?>" name="lastname">
            </div>


            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

<?php

    require('./require/footer.php');
} else {
    header('location: login.php');
}
