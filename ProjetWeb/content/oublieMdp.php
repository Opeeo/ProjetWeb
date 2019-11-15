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
                header('Location: wrongLink');
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
                                    <h3 class="login-heading mb-4">Réinitialisation du mot de passe</h3>
                                    <form method="post" action="scriptMailOublieMdp" autocomplete="on">
                                        <div class="form-label-group">
                                            <input pattern="(\w{2,}\.\w{2,}@viacesi|\w{3,}@cesi)\.fr" id="inputEmail" name="inputEmail" class="form-control" required autofocus type="text" placeholder="Adresse e-mail" oninvalid="this.setCustomValidity('Veuillez entrer votre adresse e-mail du CESI')" oninput="setCustomValidity('')"/>
                                            <label for="inputEmail">Adresse e-mail</label>
                                        </div>

                                        <button class="btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Envoyer l'e-mail</button>

                                        <center><p><a class="text-dark" href="connexion">Retourner à la page de connexion</a></p></center>
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