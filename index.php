<?php
$page = 'index';
session_start();
require('./require/co_bdd.php');
require('./require/head.php');
require('./actions/function.php');

$random = randomCategory();
$randomProd = randomProducts();



if (isset($_GET['success']) && !empty($_GET['success'])) {
  if ($_GET['success'] == 'creation') { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">Compte créé avec succès<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
  <?php } else if ($_GET['success'] == 'connect') { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">Vous êtes bien connecté<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
  <?php } else if ($_GET['success'] == 'deconnect') { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">Vous êtes bien déconnecté<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div> <?php } ?>
<?php }
?>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        <rect width="100%" height="100%" fill="#777" />
      </svg>

      <div class="container">
        <div class="carousel-caption text-start">
          <h1>Example headline.</h1>
          <p>
            Some representative placeholder content for the first slide of
            the carousel.
          </p>
          <p>
            <a class="btn btn-lg btn-primary" href="#">Sign up today</a>
          </p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        <rect width="100%" height="100%" fill="#777" />
      </svg>

      <div class="container">
        <div class="carousel-caption">
          <h1>Another example headline.</h1>
          <p>
            Some representative placeholder content for the second slide
            of the carousel.
          </p>
          <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        <rect width="100%" height="100%" fill="#777" />
      </svg>

      <div class="container">
        <div class="carousel-caption text-end">
          <h1>One more for good measure.</h1>
          <p>
            Some representative placeholder content for the third slide of
            this carousel.
          </p>
          <p>
            <a class="btn btn-lg btn-primary" href="#">Browse gallery</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="container marketing">
  <div class="row">
    <?php foreach ($random as $rand) { ?>
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#777" />
          <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
        </svg>

        <h2 class="fw-normal"><?php echo $rand['name']; ?></h2>

        <p>
          <a class="btn btn-secondary" href="#">View details &raquo;</a>
        </p>
      </div><?php } ?>

  </div>


  <?php foreach ($randomProd as $randP) {
  ?>
    <hr class="featurette-divider" />

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">
          <?= htmlspecialchars($randP['nom']) ?>
          <span class="text-muted">It’ll blow your mind.</span>
        </h2>
        <p class="lead">
          <?= htmlspecialchars($randP['contenu']) ?>
        </p>
        <a href="product.php?id=<?= $randP['id'] ?>"><button type="button" class="btn btn-outline-primary">
            Voir le produit
          </button></a>
      </div>
      <div class="col-md-5">

        <img class="img" src="./assets/pics/<?= $randP['image'] ?>" alt="">
      </div>
    </div><?php } ?>

  <hr class="featurette-divider" />

</div>



<?php require('./require/footer.php') ?>
</body>

</html>