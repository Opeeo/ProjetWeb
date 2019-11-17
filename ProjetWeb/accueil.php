<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Hello, world!</title>
    <link rel="stylesheet" href="assets/css/accueil.css">
  </head>
  <body>

<header>
    <h2 class="text-center py-4">Nos produits les plus vendu :</h2>
    <hr>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide 1 -->
      <div class="carousel-item active" style="background-image: url('http://via.placeholder.com/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Première Slide</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus nisi alias ipsa laboriosam iste illum, quae fugiat asperiores. Ullam veniam quos rem pariatur est impedit voluptas atque consectetur, ad dolorum?</p>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="carousel-item" style="background-image: url('http://via.placeholder.com/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Deuxième Slide</h2>
          <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium libero quo corrupti, veritatis odio, iusto provident aperiam fuga consectetur porro vero nihil harum? Libero omnis dignissimos ipsum veniam nesciunt a!</p>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="carousel-item" style="background-image: url('http://via.placeholder.com/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Troisième Slide</h2>
          <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nulla vitae! Ut facere et cum, aspernatur ab provident saepe delectus ducimus, praesentium, veniam debitis dolore. Corrupti quos perspiciatis ipsa ea.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Précédent</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Suivant</span>
        </a>
  </div>
</header>

<!-- Page Content -->
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

    <!-- /.container -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>

  </body>
</html>