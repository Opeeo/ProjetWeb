<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
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

        <?php if(!isset($_SESSION['verificationMail'])){
		    header('Location: wrongLink');
		    exit();
            } ?>

        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4">Confirmation de mot de passe :</h3>
                                    <form method="post" action="scriptMdp" oninput='inputConfirmPassword.setCustomValidity(inputConfirmPassword.value != inputPassword.value ? "Les mots de passe doivent correspondrent." : "")'>
                        
                                        <div class="form-label-group">
                                            <input pattern="(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w*" type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required autofocus oninvalid="this.setCustomValidity('Le mot de passe doit contenir au moins 1 chiffre, 1 minuscule et 1 majuscule')" oninput="setCustomValidity('')">
                                            <label for="inputPassword">Nouveau mot de passe :</label>
                                        </div>

                                        <div class="form-label-group">
                                            <input pattern="(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w*" type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                                            <label for="inputConfirmPassword">Confirmation du mot de passe :</label>
                                        </div>

                                        <button class="btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Valider</button>
                                        <p><a class="text-dark" href="../index.php">Retour à l'accueil</a></p>
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
