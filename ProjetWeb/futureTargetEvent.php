<?php session_start();?>

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

        include "content/eventVerif.php";

        $event = null;

        for ($i = 0 ; $i < count($eventF) ; $i++) {

            if ($eventF[$i]['id'] == $_GET['id']) {
                $event = $eventF[$i];
            }
        }


        echo "
     
    <div class='row justify-content-center'>
        <div class='card' style='width: 55em;'>
            <img src='". $event['illust'] ."' class='card-img-top'>
            <div class='card-body' style='height: 4em'>
                <h5 class='card-title text-center'>". $event['nom'] ."</h5>
            </div>
            <div class='card-body'>
                <h6 class='card-title'>Description de l'événement :</h6>
                <p class='card-text'>". $event['description'] ."</p>
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
                    ". $event['date'] ."
                </div>
            </div>
        </div>
         
        <div class='m-3'>
            <div class='card' style='width: 25em'>
                <div class='text-white text-center' style='background-color: black; border-radius: 3px 3px 0 0; width: 24.9em'>
                    <h6 class='card-title text-center m-2'>Prix</h6>
                </div>
                <div class='card-body text-center'>
                    ". $event['prix'] ." €
                </div>
            </div>
        </div>
     </div>";

     if(isset($_SESSION['mail'])){


        $recupInscription = file_get_contents("http://localhost:3003/isUserInEvent/" . $_SESSION['id'] . "/" . $event['id']);
     
    
        if($recupInscription != ""){

             echo "

         <div class='row justify-content-center'>
             <a class='button-link' href='content/desinscripEvent?idEvent=" . $event['id'] . "'>
                <button class='btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button'>Se désinscrire</button>
             </a>
         </div>
            
            "; 
        }
        else{

            echo "

            <div class='row justify-content-center'>
                <a class='button-link' href='content/inscripEvent?idEvent=" . $event['id'] . "'>
                   <button class='btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button'>S'inscrire</button>
                </a>
            </div>
               
               "; 


        }
     }
     else{

        echo "

        <div class='row justify-content-center'>
            <a class='button-link'>
               <button class='disabled btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button'>Vous devez etre connecter pour vous inscrire</button>
            </a>
        </div>
           
           "; 
        
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

