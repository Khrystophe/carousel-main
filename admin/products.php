<?php

require('./assets/components/header.php');
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');

$getAllProd = getAllProducts();
$categorie = getCategory();


?>



<h1>Page Produits</h1>

<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Ajouter un produit
</button>
<br><br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="./assets/produits/addproduct.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Nom du produit</label>
                        <input type="text" class="form-control" id="productName" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prix</label>
                        <input type="text" class="form-control" id="price" name="prix">
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="contenu"></textarea>
                            <label for="floatingTextarea2">Description</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="id_categorie">
                            <option selected>Catégorie</option>
                            <?php foreach ($categorie as $cat) { ?>
                                <option value="<?= htmlspecialchars($cat['id']) ?>">
                                    <?= htmlspecialchars($cat['name']) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
            <th scope="col">contenu</th>
            <th scope="col">prix</th>
            <th scope="col">action</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($getAllProd as $prod) { ?>
            <tr>
                <th scope="col"><?= $prod['id'] ?></th>
                <td scope="col"><?= $prod['nom'] ?></td>
                <td scope="col"><?= $prod['contenu'] ?></td>
                <td scope="col"><?= $prod['prix'] ?></td>
                <td scope="col"><a href="./assets/produits/deleteProduct.php?id=<?= $prod['id'] ?>">Supprimer</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<?php

require('./assets/components/footer.php'); ?>