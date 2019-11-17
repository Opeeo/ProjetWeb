<?php session_start();?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <?php include("content/head.php") ?>
        <link rel="stylesheet" href="assets/css/contact.css">
        <title>BDE Cesi Toulouse - Contact</title>
    </head>
    <body>
        <?php include("content/navbar.php") ?>

        <div class="container contact">
            <div class="row">
                <div class="col-md-3">
                    <div class="contact-info">
                        <img src="assets/vendors/pictures/courriel.png" alt="imageCourriel"/>
                        <h2 class="text-white">Nous Contacter :</h2>
                        <h4 class="text-white">N'hésitez pas à poser vos questions !</h4>
                    </div>
                    <div class="info-cesi">
                        <address class="text-secondary">
                            16 rue Magellan, Bât. Alpha <br>
                            Toulouse, Labège 31670<br>
                            Tél. : 06.01.23.45.67
                        </address>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="contact-form">
                        <div class="form-group">
                        <label class="control-label col-sm-2" class="text-white" for="prenom">Prénom :</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="prenom" placeholder="Entrer votre prénom" name="prenom">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nom">Nom :</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="nom" placeholder="Entrer votre nom" name="nom">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email :</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Entrer votre email" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="comment">Demande :</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>
                        </div>

                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-dark">Envoyer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include("content/foot.php") ?>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>