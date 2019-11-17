<?php

    function displayProduct($productName, $productPrix, $productQuantity, $productImage, $productId) {

        echo "
        
        <div class='card text-left' style='width: 24em; display: inline-block; margin: 20px'>
            
            <img src='$productImage' style='width: 24em; height: 13.5em'>
            
            <div class='card-body' style='height: 6em'>
            
                <h5 class='card-title'>$productName</h5>
            
            </div>
            
            <ul class='list-group list-group - flush'>
                
                <li class='list-group-item'>Quantité disponible :  $productQuantity</li>
                <li class='list-group-item'>Prix :  $productPrix €</li>
            </ul>
            
            
            <div style='padding: 0' class='card-body'>
                <a class='button-link' href='targetArticle.php?id=$productId'>
                    <button class='btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button'>Voir le produit</button>
                </a>
            </div>
            
        
        </div>
        

        
        ";


    }
