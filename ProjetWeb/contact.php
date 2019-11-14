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
                </div>
                <div class="col-md-9">
                    <div class="contact-form">
                        <div class="form-group">
                        <label class="control-label col-sm-2" class="text-white" for="prenom">Prénom:</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="prenom" placeholder="Entrer votre prénom" name="prenom">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nom">Nom:</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control" id="nom" placeholder="Entrer votre nom" name="nom">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Entrer votre email" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="comment">Commentaire:</label>
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
    </body>
</html>