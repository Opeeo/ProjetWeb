<?php

    include "content/displayPastEvent.php";

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

            <div class="row justify-content-center">

                <?php
                if(isset($_SESSION['mail'])) {
                    if($_SESSION['statut'] == 2 || $_SESSION['statut'] == 3) {
                        echo "
                            <a class='button-link' href='content/dlPhotosEvents.php'>
                                <button class='btn btn-lg btn-info btn-block btn-login text-uppercase font-weight-bold custom-button m-3'  style='width: 20em'>Télecharger toutes les photos des événements</button>
                            </a>
                        ";
                    }

                }
                ?>

            </div>
            <?php

            include "content/eventVerif.php";



            for ($i = 0 ; $i < count($eventP) ; $i++) {

                displayPastEvent($eventP[$i]->nom, $eventP[$i]->image, $eventP[$i]->date, $eventP[$i]->id);

            }



            ?>
        </main>

        <?php include("content/foot.php") ?>

        <!-- Bootstrap core JavaScript, JQuerry, Poppers-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

