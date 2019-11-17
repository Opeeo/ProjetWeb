<?php session_start();?>

<!DOCTYPE html>

<html lang="fr">
  <head>
    <?php include("content/head.php") ?>
    <link rel="stylesheet" href="assets/css/accueil.css">
    <title>BDE Cesi Toulouse</title>
  </head>

  <body>
    <header>
      <?php include("content/navbar.php") ?>
    </header>
 
    <main role="main" class="container">

      <!-- Header -->
      <header class="bg-primary text-center py-5 mb-4">
        <div class="container">
          <h1 class="font-weight-light text-white">Notre équipe :</h1>
        </div>
      </header>

      <!-- Page Content -->
      <div class="container">
        <div class="row">
          <!-- Membre 1 -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-lg">
              <img src="assets/vendors/pictures/GR.png" class="card-img-top" alt="GB">
              <div class="card-body text-center">
                <h5 class="card-title mb-0">Membre</h5>
                <div class="card-text text-black-50">Gabriel RICARD</div>
              </div>
            </div>
          </div>
          <!-- Membre 2 -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-lg">
              <img src="assets/vendors/pictures/CA.png" class="card-img-top" alt="GB">
              <div class="card-body text-center">
                <h5 class="card-title mb-0">Chef de Groupe</h5>
                <div class="card-text text-black-50">Clément ALBOS</div>
              </div>
            </div>
          </div>
          <!-- Membre 3 -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-lg">
              <img src="assets/vendors/pictures/TM.png" class="card-img-top" alt="GB">
              <div class="card-body text-center">
                <h5 class="card-title mb-0">Membre</h5>
                <div class="card-text text-black-50">Thibaut MAITREPIERRE</div>
              </div>
            </div>
          </div>
          <!-- Membre 4 -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-lg">
              <img src="assets/vendors/pictures/CP.png" class="card-img-top" alt="GB">
              <div class="card-body text-center">
                <h5 class="card-title mb-0">Membre</h5>
                <div class="card-text text-black-50">Corentin PAUGAM</div>
              </div>
            </div>
          </div>
      </div>

      <!-- Contenu Page -->
      <section class="py-5 text-center">
          <div class="container"> 
              <h2 class="text-center">Nos services :</h2>
              <p class="text-muted mb-5 text-center">Notre BDE vous permettra de vous investir dans la vie de votre campus, et surtout d'enchanter votre vie au campus comme :</p>
              <div class="row">
                <div class="col-sm-6 col-lg-4 mb-3">
                  <img src="assets/vendors/pictures/calendar.png" alt="evenement" height=125 width=125>
                  <hr>
                  <h6>Palmarès</h6>
                  <p class="text-muted">Des envies ? Redécouvrer nos <strong><a href="pastEvent.php">précédents événement</a></strong> et donnez-y votre avis !</p>
                </div>
                <div class="col-sm-6 col-lg-4 mb-3">
                  <img src="assets/vendors/pictures/disco-ball.png" alt="evenement" height=125 width=125>
                      <hr>
                  <h6>Événementiel</h6>
                  <p class="text-muted">Besoin de sortir entre amis ? Profiter d'une multitude d'événement organiser par le BDE à <strong><a href="futureEvent.php">voir ici !</a></strong></p>
                </div>
                <div class="col-sm-6 col-lg-4 mb-3">
                  <img src="assets/vendors/pictures/product.png" alt="evenement" height=125 width=125>
                      <hr>
                  <h6>Boutique</h6>
                  <p class="text-muted">Une petite envie de shopping ? Accéder à <strong><a href="boutique.php">nos articles</a></strong> pour parfaire votre garde-robe et aider le BDE !</p>
                </div>
              </div>
          </div>
      </section>

      <header>
        <h2 class="text-center py-4">Nos produits les plus vendu :</h2>
        <hr>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="assets/vendors/pictures/oui1000.png" alt="Première slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/vendors/pictures/oui1000.png" alt="Deuxième slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="assets/vendors/pictures/oui1000.png" alt="Troisième slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
      </header>
    </main>
    
  <?php include("content/foot.php") ?>
  </body>
</html>