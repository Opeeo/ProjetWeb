<?php

    function displayProduct($ProductName, $ProductPrix, $ProductQuantity, $ProductImage, $ProductDesc, $ProductId) {

        echo "
        
        <div class='card text-left' style='width: 24em; display: inline-block; margin: 20px'>
            
            <img src='$ProductImage' style='width: 24em; height: 13.5em'>
            
            <div class='card-body' style='height: 6em'>
            
                <h5 class='card-title'>$ProductName</h5>
            
            </div>
            
            <ul class='list-group list-group - flush'>
                <li class='list-group-item'>
                    <p class='card-text font-'>$ProductDesc</p>
                </li>
                
                <li class='list-group-item'>Quantité disponible :  $ProductQuantity</li>
                <li class='list-group-item'>Prix :  $ProductPrix €</li>
            </ul>
            
            
            <div style='padding: 0' class='card-body'>
                <a class='button-link' href='#'>
                    <button class='btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button'>Voir l'événement</button>
                </a>
            </div>
            
        
        </div>
        

        
        ";


    }
