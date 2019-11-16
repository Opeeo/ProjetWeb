<?php session_start();?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <?php include("content/head.php") ?>
    <title>BDE Cesi Toulouse</title>
</head>

<body>

<header>
    <?php include("content/navbar.php") ?>
</header>


<main role="main" class="container">
    <div class="container">

        <div class="row add-container">
            <div class="col-md-10 col-lg-9 mx-auto">
                <h3 class="login-heading mb-4">Ajouter une image :</h3>

                <!-- TODO: Action du formulaire à modifier -->

                <form action="content/scriptAjoutImage.php?

                <?php

                echo "eventid=" . $_GET['eventid'];


                ?>




                " method="post">

                    <div class="form-label-group">
                        <input type="url" class="form-control" id="inputImage" name="lien" placeholder="Lien de l'image" required />
                    </div>

                    <button class="btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Envoyer la photo</button>
                </form>
            </div>
        </div>
</main>

<?php include("content/foot.php") ?>

<!-- Bootstrap core JavaScript, JQuerry, Poppers-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>