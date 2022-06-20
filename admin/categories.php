<?php

require('./assets/components/header.php');
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');


$categorie = getCategory();


?>

<h1>Page Categorie</h1>

<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Ajouter une categorie
</button>
<br><br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une categorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="./assets/categorie/addCategory.php">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Nom de la categorie</label>
                        <input type="text" class="form-control" id="productName" name="name">
                    </div>

                    <button type="submit" class="btn btn-primary">Créer la nouvelle catégorie</button>
                </form>
            </div>

        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nom</th>

        </tr>
    </thead>

    <tbody>
        <?php foreach ($categorie as $cat) { ?>
            <tr>
                <th scope="col"><?= $cat['id'] ?></th>
                <td scope="col"><?= $cat['name'] ?></td>

                <td scope="col"><a href="./assets/categorie/deleteCategory.php?id=<?= $cat['id'] ?>">Supprimer</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php

require('./assets/components/footer.php'); ?>