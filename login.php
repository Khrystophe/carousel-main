<?php
$page = 'login';
require('./require/co_bdd.php');
require('./require/head.php');

?>
<div class="container">
    <div class="row">
        <h1>Connexion</h1>
        <?php
        if (isset($_GET['error']) && !empty($_GET['error'])) {
            if ($_GET['error'] == 'empty') { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">Veuillez remplir tous les champs<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php } else if ($_GET['error'] == 'password') { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">Mot de passe faux<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php  } else if ($_GET['error'] == 'nonexist') { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">Utilisateur inconnu<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        <?php  }
        } ?>
        <form method="post" action="./actions/connexion.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=mail>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name=password>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="row">
        <h1>Inscription</h1>
        <?php
        if (isset($_GET['error']) && !empty($_GET['error'])) {
            if ($_GET['error'] == 'empty') { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">Veuillez remplir tous les champs<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php } else if ($_GET['error'] == 'invalidAdress') { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">Adresse Mail déjà utilisée<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
            <?php } else if ($_GET['error'] == 'contactAdmin') { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">Contactez un administrateur<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        <?php  }
        } ?>
        <form method="post" action="./actions/inscription.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Lasname</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lastname">

            </div>
            <div class="mb-3">

                <select class="form-select" aria-label="Default select example" name="sexe">
                    <option selected>Choisissez votre sexe</option>
                    <option value="feminin">Féminin</option>
                    <option value="2masculin">Masculin</option>
                    <option value="autre">Autre</option>
                </select>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<br><br>
<?php
require('./require/footer.php'); ?>