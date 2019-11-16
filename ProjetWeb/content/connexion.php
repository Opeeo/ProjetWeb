<?php session_start();?>

<!DOCTYPE html>

<html>

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    </head>

    <body>

        <?php if(isset($_SESSION['mail'])){
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
                                    <h3 class="login-heading mb-4">Accéder à votre espace BDE :</h3>
                                    <form method="post" action="scriptConnexion.php" autocomplete="on">
                                        <div class="form-label-group">
                                            <input pattern="(\w{2,}\.\w{2,}@viacesi|\w{3,}@cesi)\.fr" id="inputEmail" name="inputEmail" class="form-control" required autofocus type="text" placeholder="Adresse e-mail" oninvalid="this.setCustomValidity('Veuillez entrer votre adresse e-mail du CESI')" oninput="setCustomValidity('')"/>
                                            <label for="inputEmail"> Adresse e-mail</label>
                                        </div>
      
                                        <div class="form-label-group">
                                            <input pattern="(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w*" id="inputPassword" name="inputPassword" class="form-control" required autofocus type="password" placeholder="Mot de passe" oninvalid="this.setCustomValidity('Mauvais format de mot de passe')" oninput="setCustomValidity('')"/> 
                                            <label for="inputPassword">Mot de passe</label>
                                        </div>

                                        <center><p><a class="text-dark" href="oublieMdp.php">Mot de passe oublié ?</a></p></center>
                                        <button class="btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Connexion</button>

                                        <center><p>Vous n'avez encore de compte ? <a class="text-dark" href="inscription.php">Inscription</a></p></center>
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