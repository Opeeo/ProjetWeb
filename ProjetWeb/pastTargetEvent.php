<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include("content/head.php") ?>
    <link rel="stylesheet" href="assets/css/futureTargetEvent.css">
    <link rel="stylesheet" href="assets/css/carousel.css">
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

    include "content/eventVerif.php";



    $event = null;

    for ($i = 0 ; $i < count($eventP) ; $i++) {

        if ($eventP[$i]->id == $_GET['id']) {
            $event = $eventP[$i];
        }
    }

    $img = str_replace("*", "/", $event->image);


    echo "
     
    <div class='row justify-content-center'>
        <div class='card' style='width: 55em;'>
            <img src='" . $img . "' class='card-img-top'>
            <div class='card-body' style='height: 4em'>
                <h5 class='card-title text-center'>" . $event->nom . "</h5>
            </div>
            <div class='card-body'>
                <h6 class='card-title'>Description de l'événement :</h6>
                <p class='card-text'>" . $event->description . "</p>
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
                    " . $event->date . "
                </div>
            </div>
        </div>

     </div>
     
    
     
     <!-- Template de carte image et commentaire -->
     <div class='row justify-content-center'>
        <div class='card' style='width: 55em'>
        
            <div class='card-body' style='height: 3em'>
                <h5 class='card-title text-center'>Photos de l'événement</h5>
            </div>
            <div class='card-body'>";




            for ($i = 0 ; $i < count($event->photo) ; $i++) {

                $photoUser = file_get_contents("http://localhost:3003/recupUsers/" . $event->photo[$i]->id_utilisateur);
                $json = json_decode($photoUser);

                $lien = str_replace("*", "/", $event->photo[$i]->lien);


                echo "
                <div class='card'>
                    <div class='card-body' style='height: 3.5em'>
                        <h6 class='card-title'>" . $json[0]->prenom ." " . $json[0]->nom . "</h6>
                    </div>
                    <img class='card-img-top' src='" . $lien . "'>
                    <div class='card-body'>
                        
                ";

                if(isset($_SESSION['mail'])) {
                    if($_SESSION['statut'] == 2) {
                        echo "
                                <a class='button-link m-1' style='width: 20em'>
                                    <button class='btn btn-lg btn-danger btn-block btn-login text-uppercase font-weight-bold custom-button' style='background-color: red'>Supprimer photo</button>
                                </a>
                            </div>
                                ";
                    }
                }

                if (isset($event->photo[$i]->commentaire)) {

                    echo "<h6 class='card-title text-center'>Commentaire de la photo</h6>";

                    for ($j = 0; $j < count($event->photo[$i]->commentaire); $j++) {

                        if(isset($event->photo[$i]->commentaire[$j])) {

                            $photoComsUser = file_get_contents("http://localhost:3003/recupUsers/" . $event->photo[$i]->commentaire[$j]->id_utilisateur);
                            $json2 = json_decode($photoComsUser);

                            $comsParse1 = explode('T', $event->photo[$i]->commentaire[$j]->date);
                            $comsParse2 = explode('-', $comsParse1[0]);
                            $comsDate = $comsParse2[2] . "/" . $comsParse2[1] . "/" . $comsParse2[0];

                            $comsContenu = str_replace("*", " ", $event->photo[$i]->commentaire[$j]->contenu);

                            echo "
                        
                        <div class='card'>
                            <div class='card-body'>
                                <h6 class='card-title'>" . $comsDate . " - " . $json2[0]->prenom . " " . $json2[0]->nom . "</h6>
                                <p class=''>" . $comsContenu . "</p>
                            </div>
                        
                        
                                ";

                            if (isset($_SESSION['mail'])) {
                                if ($_SESSION['statut'] == 2) {
                                    echo "
                                <a class='button-link m-1' style='width: 20em'>
                                    <button class='btn btn-lg btn-danger btn-block btn-login text-uppercase font-weight-bold custom-button' style='background-color: red'>Supprimer commentaire</button>
                                </a>
                            </div>
                            
                                ";
                                }
                            }

                            echo "</div>";

                        }

                    }
                }


                if (isset($_SESSION['mail'])) {

                    echo "
                            <a href='ajoutCommentaire.php?eventid=" . $_GET['id'] . "&photoid=". $event->photo[$i]->id ."' class='button-link m-1'>
                                <button class='btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button'>Ajouter un commentaire</button>
                            </a>
                    ";
                }


                echo "
                    </div>
                    </div>
                    </div>
                ";
            }

            if(isset($_SESSION['mail'])) {

                $response = file_get_contents("http://localhost:3003/isUserInEvent/" . $_SESSION['id'] ."/" . $_GET['id']);

                if ($response == "Trouvé !") {

                    echo "
                            <a href='ajoutImage.php?eventid=". $_GET['id'] ."' class='button-link m-1'>
                                <button class='btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button'>Ajouter une photo</button>
                            </a>
                    ";

                }

            }


            echo "
                </div>
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

