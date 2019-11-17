<?php session_start();?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <?php //include("content/head.php") ?>
        <title>Boutique</title>
       <link rel="stylesheet" href="./assets/css/boutique.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- CSS slider -->
       <link href="assets/css/slider.css" rel="stylesheet">
        <link href="assets/css/navbar.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/futureEvent.css">
    </head>
    <body>
        <?php include("content/navbar.php") ?>
        
        <main role="main" class="container">
            <!-- Page Content -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <h4 class="my-3">Boutique BDE</h4>
                        <div class="list-group ">
                            <!-- Trigger modal -->
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">Trier par...</button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Choisissez vos filtres :</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>

                                                <!-- Slider min max Prix-->
                                                <div id="rangeBox">
                                                    <!-- Partie gauche puis droite du slider -->    
                                                    <div id="sliderBox">
                                                        <input type="range" id="slider0to50" class="custom-range" step="1" min="0" max="50">
                                                        <input type="range" id="slider51to100" class="custom-range" step="1" min="50" max="100">
                                                    </div>
                                                    <!-- Box value min et max du slider -->
                                                    <div id="inputRange">
                                                        <input type="number" step="1" min="0" max="50" placeholder="Min €" id="min" >
                                                        <input type="number" step="1" min="51" max="100" placeholder="Max €" id="max">
                                                    </div>
                                                </div>

                                                <!-- Checkboxs des catégories -->
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="CP1">
                                                    <label class="custom-control-label" for="CP1">Textile</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="CP2">
                                                    <label class="custom-control-label" for="CP2">Accessoires</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="CP3">
                                                    <label class="custom-control-label" for="CP3">Alcool</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="CP4">
                                                    <label class="custom-control-label" for="CP4">Avions</label>
                                                </div>

                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>
                                                        <button type="button submit" class="btn btn-success">Valider</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php

                    include "content/displayProduct.php";

                    $jsonProd = file_get_contents("http://localhost:3003/recupProduit");

                    $resultProd = json_decode($jsonProd);

                    if(!empty($resultProd)){

                        for($i = 0 ; $i < count($resultProd) ;  $i++){

                            $name = str_replace("*", " ", $resultProd[$i]->nom);

                            $img = str_replace("*", "/", $resultProd[$i]->img);

                            displayProduct($name,$resultProd[$i]->prix,$resultProd[$i]->quantite,$img,$resultProd[$i]->id);
                        }

                    }

                    ?>
                </div>
            </div>
        </main>

        <?php include("content/foot.php") ?>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="content/rangeValue.js"></script>
    </body>
</html>
