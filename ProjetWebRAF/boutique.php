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


                    $prod = [];

                    for ($i = 0 ; $i < count($resultProd) ; $i++) {
                        $prod[$i]['id'] = $resultProd[$i]->id;
                        $prod[$i]['quantite'] = 0;
                    }

                    for ($i = 0 ; $i < count($resultBest); $i++) {

                        $jsonCommandes = json_decode($resultBest[$i]->contenu);

                        for ($j = 0 ; $j < count($jsonCommandes) ; $j++) {

                            for ($k = 0 ; $k < count($prod) ; $k++) {

                                if($jsonCommandes[$j]->idProduit == $prod[$k]['id']) {

                                    $prod[$k]['quantite'] = $prod[$k]['quantite'] + $jsonCommandes[$j]->quantite;

                                }

                            }

                        }

                    }



                    if (isset($prod) && $prod[0]) {

                        $bestId1 = [];
                        for ($i = 0; $i < count($prod); $i++) {
                            if ($i == 0) {
                                $bestId1 = $prod[$i];
                            } elseif ($prod[$i]['quantite'] > $bestId1['quantite']) {
                                $bestId1 = $prod[$i];
                            }

                        }

                        $bestId2 = [];
                        $skip2 = 0;
                        for ($i = 0; $i < count($prod); $i++) {

                            if ($prod[$i]['id'] != $bestId1['id']) {
                                if ($skip2 == $i) {
                                    $bestId2 = $prod[$i];
                                } elseif ($prod[$i]['quantite'] > $bestId2['quantite']) {
                                    $bestId2 = $prod[$i];
                                }
                            } else {
                                $skip2 = $i + 1;
                            }

                        }

                        $bestId3 = [];
                        $skip3 = 0;
                        for ($i = 0; $i < count($prod); $i++) {

                            if ($prod[$i]['id'] != $bestId1['id'] && $prod[$i]['id'] != $bestId2['id']) {
                                if ($skip3 == $i) {
                                    $bestId3 = $prod[$i];
                                } elseif ($prod[$i]['quantite'] > $bestId3['quantite']) {
                                    $bestId3 = $prod[$i];
                                }
                            } else {
                                $skip3 = $i + 1;
                            }

                        }

                        for ($i = 0 ; $i < count($resultProd) ; $i++) {

                            if ($resultProd[$i]->id == $bestId1['id'] && $bestId1['quantite'] != 0) {
                                $best1 = $resultProd[$i];
                            } elseif ($resultProd[$i]->id == $bestId2['id'] && $bestId2['quantite'] != 0) {
                                $best2 = $resultProd[$i];
                            } elseif ($resultProd[$i]->id == $bestId3['id'] && $bestId3['quantite'] != 0) {
                                $best3 = $resultProd[$i];
                            }

                        }

                    }


                    include "content/displayProduct.php";

                    if(isset($_GET['index'])) {

                        if (isset($best1)) {
                            $nameBest1 = str_replace("*", " ", $best1->nom);
                            $imgBest1 = str_replace("*", "/", $best1->img);
                            displayProduct($nameBest1, $best1->prix, $best1->quantite, $imgBest1, $best1->id);
                        }

                        if (isset($best2)) {
                            $nameBest2 = str_replace("*", " ", $best2->nom);
                            $imgBest2 = str_replace("*", "/", $best2->img);
                            displayProduct($nameBest2, $best2->prix, $best2->quantite, $imgBest2, $best2->id);
                        }

                        if (isset($best3)) {
                            $nameBest3 = str_replace("*", " ", $best3->nom);
                            $imgBest3 = str_replace("*", "/", $best3->img);
                            displayProduct($nameBest3, $best3->prix, $best3->quantite, $imgBest3, $best3->id);
                        }

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
