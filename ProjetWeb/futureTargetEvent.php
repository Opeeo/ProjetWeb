<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include("content/head.php") ?>
    <link rel="stylesheet" href="assets/css/futureTargetEvent.css">
    <title>BDE Cesi Toulouse</title>
</head>

<body>

<?php include("content/navbar.php") ?>

<main role="main" class="container">
    <?php
        /*
         * TODO: Faire le lien avec l'API en fonction de la variable $_GET['id']
         *
         *
         */

        //$currentEvent = file_get_content(' \\ TO DO // ');

        echo "
     
    <div class='row justify-content-center'>
        <div class='card' style='width: 55em;'>
            <img src='https://static.tumblr.com/606ca6e9253aecc22b1af40c2f27e09f/nanwix9/sn8p0vdbp/tumblr_static_9mayriax30o4gokoggkgo8ww8_2048_v2.jpg' class='card-img-top'>
            <div class='card-body' style='height: 4em'>
                <h5 class='card-title text-center'>What a good event</h5>
            </div>
            <div class='card-body'>
                <h6 class='card-title'>Description de l'événement :</h6>
                <p class='card-text'>En physique, un événement (on peut aussi écrire évènement) est un point de l'espace-temps, correspondant à un certain lieu à un certain instant.

Par rapport à la signification courante du mot événement, l'événement physique définit la position et la date de l'évènement ordinaire, sans fournir d'information sur la nature de cet évènement ordinaire.

Dans un système de coordonnées, un événement est repéré par quatre nombres, ce qui correspond au fait que l'espace-temps est de dimension 4. Par exemple, dans le système de coordonnées terrestres et l'heure GMT, on donnera la latitude, la longitude, l'altitude et l'instant.

En relativité restreinte le concept d'événement a une importance capitale : dans cette théorie, les coordonnées d'espace et de temps sont inséparables (c'est différent de la relativité galiléenne qui est une approximation dans laquelle le temps et l'espace sont séparables).

Les coordonnées d'espace-temps repérant un évènement dépendent du mouvement de l'observateur (le référentiel) et subissent une transformation de Lorentz quand on change de référentiel.</p>
            </div>
        </div>
     </div>
     
     <div class='row justify-content-center'>
        <div class='m-3'>
            <div class='card'  style='width: 25em'>
                <div class='text-white text-center' style='background-color: black; border-radius: 3px 3px 0 0; width: 24.9em'>
                    <h6 class='card-title text-center m-2'>Date</h6>
                </div>
                <div class='card-body text-center'>
                    17/11/2019
                </div>
            </div>
        </div>
         
        <div class='m-3'>
            <div class='card' style='width: 25em'>
                <div class='text-white text-center' style='background-color: black; border-radius: 3px 3px 0 0; width: 24.9em'>
                    <h6 class='card-title text-center m-2'>Prix</h6>
                </div>
                <div class='card-body text-center'>
                    100 €
                </div>
            </div>
        </div>
     </div>
     
     <div class='row justify-content-center'>
         <a class='button-link' href='#'>
            <button class='btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button'>Inscription</button>
         </a>
     </div>
        
        ";

    ?>
</main>

<?php include("content/foot.php") ?>

<!-- Bootstrap core JavaScript, JQuerry, Poppers-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

