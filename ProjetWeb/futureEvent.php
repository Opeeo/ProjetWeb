<?php
    session_start();
    include "content/displayFutureEvent.php";
?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <?php include("content/head.php") ?>
        <link rel="stylesheet" href="assets/css/futureEvent.css">
        <title>BDE Cesi Toulouse</title>
    </head>

    <body>

        <?php include("content/navbar.php") ?>

        <main role="main" class="container text-center">

            <?php


                /*
                 *
                 *  TODO: Implémenter la connexion API + détection Event à venir (Par Clément)
                 *
                 */

                include "content/eventVerif.php";


                for ($i = 0 ; $i < count($eventF) ; $i++) {

                    displayFutureEvent($eventF[$i]['nom'], $eventF[$i]['prix'], $eventF[$i]['illust'], $parseDate, $eventF[$i]['id']);

                }

            ?>


        </main>

        <?php include("content/foot.php") ?>

        <!-- Bootstrap core JavaScript, JQuerry, Poppers-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

