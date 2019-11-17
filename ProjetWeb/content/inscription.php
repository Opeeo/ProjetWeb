<?php session_start(); ?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="../assets/css/inscription.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    </head>

    <body>

        <?php 
            if(isset($_SESSION['mail'])){
                header('Location: wrongLink.php');
                exit();
            }
            include("controle-connexion.php") ?>

        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4">Rejoindre votre espace BDE</h3>
                                    <form method="post" action="scriptInscription.php" autocomplete="on"> 
                                        <div class="form-label-group">
                                            <input pattern="(\w{2,}\.\w{2,}@viacesi|\w{3,}@cesi)\.fr" id="inputEmail" class="form-control" name="inputEmail" required autofocus type="text" placeholder="adresse mail" oninvalid="this.setCustomValidity('Veuillez entrer votre adresse e-mail du CESI')" oninput="setCustomValidity('')"/>
                                            <label for="inputEmail">Adresse mail</label>
                                        </div>

                                        <div class="form-label-group"> 
                                            <input pattern="([a-z]|[A-Z]|\s|-|'){2,20}" id="inputFirstName" class="form-control" name="inputFirstName" required type="text" placeholder="prénom"/>
                                            <label for="inputFirstName">Prénom</label>
                                        </div>

                                        <div class="form-label-group"> 
                                            <input pattern="([a-z]|[A-Z]|\s|-|'){2,20}" id="inputName" class="form-control" name="inputName" required type="text" placeholder="nom"/>
                                            <label for="inputName">Nom</label>
                                        </div>

                                        <!-- Check campus Toulouse ? -->
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="CP" required>
                                            <label class="custom-control-label" for="CP">Inscription au campus de Toulouse</label>
                                        </div>

                                        <!-- Check CGU acceptées ? -->
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="CGU" required>
                                            <label class="custom-control-label" for="CGU"><strong><a class="text-dark" href="../ml.php">Mentions Légales</a></strong></label>
                                        </div>

                                        <button class="btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Inscription</button>
                                        
                                        <center><p>Vous avez déjà un compte ? <a class="text-dark" href="connexion.php">Connexion</a></p></center>
                                        <center><p><a class="text-dark" href="../index.php">Retour à l'accueil</a></p></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>