<?php

    function displayProduct($productName, $productPrix, $productQuantity, $productImage, $productId) {

        echo "
        
        <div class='card text-left' style='width: 20em; display: inline-block; margin: 20px'>
            
            <img src='$productImage' style='width: 20em; height: 11.25em'>
            
            <div class='card-body' style='height: 6em'>
            
                <h5 class='card-title'>$productName</h5>
            
            </div>
            
            <ul class='list-group list-group - flush'>
                
                <li class='list-group-item'>Quantité disponible :  $productQuantity</li>
                <li class='list-group-item'>Prix :  $productPrix €</li>
            </ul>
            
            
            <div style='padding: 0' class='card-body'>
                <a href='targetArticle.php?id=". $productId ."' class='button-link'>
                    <button class='btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button'>Voir le produit</button>
                </a>
                
                ";

        if(isset($_SESSION['mail'])) {
            if($_SESSION['statut'] == 3) {

                echo "
                
                <a href='content/scriptDeleteProduct.php?id=" . $productId . "' class='button-link'>
                    <button class='btn btn-lg btn-danger btn-block btn-login text-uppercase font-weight-bold custom-button'>Supprimer le produit</button>
                </a>
                
                ";

            }

        }

            echo "
            </div>
        </div>
        ";


    }
