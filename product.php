<?php
$page = 'product';
session_start();
require('./require/co_bdd.php');
require('./require/head.php');
require('./actions/function.php');

$selectProd = selectProduct();


?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <img src="./admin/assets/uploads/<?= $selectProd['image'] ?>" class="card-img" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $selectProd['nom'] ?></h5>

                <p class="card-text"><?= $selectProd['contenu'] ?></p>
                <p class="card-text"><?= number_format($selectProd['prix'], 2, ".", " ") ?></p>
                <a href="#" class="btn btn-primary">Ajouter au panier</a>
                <a href="product.php?id=<?= $selectProd['id'] ?>" class="btn btn-primary">Page produit</a>
            </div>
        </div>
    </div>

</div>