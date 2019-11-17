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

        
        $jsonProd = file_get_contents("http://localhost:3003/recupProduit");

        $resultProd = json_decode($jsonProd);

        for ( $i = 0 ; $i < count($resultProd); $i++) {

                $allArticle[$i]['nom'] = $resultProd[$i]->nom;
                $allArticle[$i]['prix'] = $resultProd[$i]->prix;
                $allArticle[$i]['img'] = $resultProd[$i]->img;
                $allArticle[$i]['id'] = $resultProd[$i]->id;
          
        }

        for ($i = 0 ; $i < count($resultProd) ; $i++) {

            if ($allArticle[$i]['id'] == $_GET['id']) {
                $article = $allArticle[$i];
            }
        }

        $img = str_replace("*", "/", $article['img']);

        $name = str_replace("*", " ", $article['nom']);


        echo "
     
    <div class='row justify-content-center'>
        <div class='card' style='width: 55em;'>
            <img src='". $img ."' class='card-img-top'>
            <div class='card-body' style='height: 4em'>
                <h5 class='card-title text-center'>". $name ."</h5>
            </div>
         
        <div class='m-3'>
            <div class='card' style='width: 25em'>
                <div class='text-white text-center' style='background-color: black; border-radius: 3px 3px 0 0; width: 24.9em'>
                    <h6 class='card-title text-center m-2'>Prix</h6>
                </div>
                <div class='card-body text-center'>
                    ". $article['prix'] ." €
                </div>
            </div>
        </div>
     </div>";

     if(isset($_SESSION['mail'])){



            echo "

            <div class='row justify-content-center'>
                <a class='button-link' href='content/ajoutPanier.php?id=". $article['id'] ."'>
                   <button class='btn btn-lg btn-dark btn-block btn-login text-uppercase font-weight-bold custom-button'>Acheter</button>
                </a>
            </div>
               
               ";


        
     }
     else{

        echo "

        <div class='row justify-content-center'>
            <a class='button-link'href='content/connexion.php'>
               <button class='disabled btn btn-lg btn-danger btn-block btn-login text-uppercase font-weight-bold custom-button'>Vous devez être connecté pour acheter</button>
            </a>
        </div>
           
           "; 
        
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

