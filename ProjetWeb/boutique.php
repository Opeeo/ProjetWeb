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
                                            <form action="boutique.php" method="post">

                                                <!-- Slider min max Prix
                                                <div id="rangeBox">

                                                    <div id="sliderBox">
                                                        <input type="range" id="slider0to50" class="custom-range" step="1" min="0" max="50">
                                                        <input type="range" id="slider51to100" class="custom-range" step="1" min="50" max="100">
                                                    </div>

                                                    <div id="inputRange">
                                                        <input type="number" step="1" min="0" max="50" placeholder="Min €" id="min" >
                                                        <input type="number" step="1" min="51" max="100" placeholder="Max €" id="max">
                                                    </div>
                                                </div> -->

                                                <!-- Checkboxs des catégories -->
                                                <?php

                                                include "content/displayCategory.php";

                                                $category = file_get_contents("http://localhost:3003/recupCategory");
                                                $catJson = json_decode($category);

                                                if(isset($catJson)) {
                                                    for ($i = 0; $i < count($catJson) ; $i++) {
                                                        displayCategory($catJson[$i]->categorie);
                                                    }
                                                }
                                                ?>

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
                <div class="row justify-content-center m-3">
                    <h5 class="text-center">Les produits les plus vendus</h5>
                </div>
                <div class="row justify-content-center" style="background-color: #aeeeff">
                    <?php

                    $jsonProd = file_get_contents("http://localhost:3003/recupProduit");
                    $resultProd = json_decode($jsonProd);

                    $jsonBest = file_get_contents("http://localhost:3003/recupCommandes");
                    $resultBest = json_decode($jsonBest);

                    //echo var_dump(json_decode($resultBest[0]->contenu));

                    if(!empty($resultBest)){

                        for($i = 0; $i < count($resultProd); $i++) {

                            for($j = 0; $j < count($resultBest); $j++) {

                                $resultProd[$i]->best = 0;

                                $jsonBest = json_decode($resultBest[$j]->contenu);

                                for($k = 0 ; $k < count($jsonBest) ; $k++) {

                                    if($resultProd[$i]->id == $jsonBest[$k]->idProduit) {

                                        $resultProd[$i]->best = $resultProd[$i]->best + $jsonBest[$k]->quantite;

                                    }

                                }

                            }

                        }

                    }

                    //echo var_dump($resultProd[5]);

                    $best1 = 0;

                    for ($i = 0 ; $i < count($resultProd) ; $i++) {
                        if($best1 == null){
                            $best1 = $resultProd[$i];
                        } elseif($resultProd[$i]->best > $best1->best){
                            $best1 = $resultProd[$i];
                        }
                    }

                    $best2 = 0;
                    for ($i = 0 ; $i < count($resultProd) ; $i++) {
                        if($resultProd[$i] != $best1) {
                            if ($best2 == null) {
                                $best2 = $resultProd[$i];
                            } elseif ($resultProd[$i]->best > $best2->best) {
                                $best2 = $resultProd[$i];
                            }
                        }
                    }

                    $best3 = 0;
                    for ($i = 0 ; $i < count($resultProd) ; $i++) {
                        if($resultProd[$i] != $best1 && $resultProd[$i] != $best2) {
                            if ($best3 == null) {
                                $best3 = $resultProd[$i];
                            } elseif ($resultProd[$i]->best > $best3->best) {
                                $best3 = $resultProd[$i];
                            }
                        }
                    }


                    include "content/displayProduct.php";

                    if(isset($_GET['index'])) {

                        $nameBest1 = str_replace("*", " ", $best1->nom);
                        $imgBest1 = str_replace("*", "/", $best1->img);
                        displayProduct($nameBest1, $best1->prix, $best1->quantite, $imgBest1, $best1->id);

                        $nameBest2 = str_replace("*", " ", $best2->nom);
                        $imgBest2 = str_replace("*", "/", $best2->img);
                        displayProduct($nameBest2, $best2->prix, $best2->quantite, $imgBest2, $best2->id);

                        $nameBest3 = str_replace("*", " ", $best3->nom);
                        $imgBest3 = str_replace("*", "/", $best3->img);
                        displayProduct($nameBest3, $best3->prix, $best3->quantite, $imgBest3, $best3->id);

                    }


                    ?>
                </div>

                <div class="row justify-content-center">
                    <?php

                    $jsonProd = file_get_contents("http://localhost:3003/recupProduit");

                    $resultProd = json_decode($jsonProd);

                    if(!empty($resultProd)){

                        for($i = 0 ; $i < count($resultProd) ;  $i++){

                            if(isset($_POST['check'. $resultProd[$i]->categorie])) {

                                $name = str_replace("*", " ", $resultProd[$i]->nom);

                                $img = str_replace("*", "/", $resultProd[$i]->img);

                                displayProduct($name,$resultProd[$i]->prix,$resultProd[$i]->quantite,$img,$resultProd[$i]->id);

                            }

                            if(isset($_GET['index'])) {

                                $name = str_replace("*", " ", $resultProd[$i]->nom);

                                $img = str_replace("*", "/", $resultProd[$i]->img);

                                displayProduct($name,$resultProd[$i]->prix,$resultProd[$i]->quantite,$img,$resultProd[$i]->id);

                            }

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
