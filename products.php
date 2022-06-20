<?php
$page = 'products';
session_start();
require('./require/co_bdd.php');
require('./require/head.php');
require('./actions/function.php');

$getAllProd = getAllProducts();

?>
<div class="contenant">
    <?php foreach ($getAllProd as $get) { ?>
        <div class="card" style="width: 18rem;">
            <img src="./admin/assets/uploads/<?= $get['image'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $get['nom'] ?></h5>
                <div class="lead"><?= $get['name'] ?></div>
                <p class="card-text"><?= $get['contenu'] ?></p>
                <p class="card-text"><?= number_format($get['prix'], 2, ".", " ") ?>€</p>
                <div class="lien">
                    <a href="#" class="btn btn-primary">Ajouter au panier</a>
                    <a href="product.php?id=<?= $get['id'] ?>" class="btn btn-primary">Page produit</a>
                </div>
            </div>
        </div><?php } ?>

</div>