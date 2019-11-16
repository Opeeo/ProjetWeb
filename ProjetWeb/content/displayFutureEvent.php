<?php

function displayFutureEvent($nomEvent, $prixEvent, $imageEvent, $date, $EventId) {

    $img = str_replace("*", "/", $imageEvent);

    if ($prixEvent === 0) {
        $prixEvent = "Gratuit";
    } else {
        $prixEvent = $prixEvent . " €";
    }

    echo "
    
        <div class='card text-left' style='width: 20em; display: inline-block; margin: 20px'>
            
            <img src='$img' style='width: 20em; height: 11.25em'>
            
            <div class='card-body' style='height: 6em'>
            
                <h5 class='card-title'>$nomEvent</h5>
            
            </div>
            
            <ul class=\"list-group list-group-flush\">
                <li class=\"list-group-item\">Date :  $date</li>
                <li class=\"list-group-item\">Prix :  $prixEvent</li>
            </ul>
            
            
            <div style='padding: 0' class='card-body'>
                <a class='button-link' href='futureTargetEvent.php?id=$EventId'>
                    <button class=\"btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button\">Voir l'événement</button>
                </a>
            </div>
            
        
        </div>
    
    ";

}

/*
  <div class='card'>

        <div class='eventName text-center'>
            $nomEvent
        </div>

        <div class='eventImageDiv'>

            <img class='eventImage' src='$imageEvent'>

        </div>

        <div class='eventBottom'>

            <div class='eventDate text-center'>
                $date
            </div>

            <div class='eventPrice text-center'>
                $prixEvent
            </div>

        </div>

    </div>
 */
