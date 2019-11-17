<?php
session_start();
var_dump($_SESSION['panier']);
$produits = json_decode($_SESSION['panier']);


var_dump($produits);

$panier = [];


if($_SESSION['panier'] != "[{}]"){

    for($i = 0; $i < count($produits); $i++){
    
        $panier[$i]->id = $produits[$i]->id;
        $panier[$i]->quantite = $produits[$i]->quantite;
    } 
   // $panier = $prodits;
}

if($_SESSION['panier'] != "[{}]"){
    for($i = 0 ; $i < count($produits); $i++){
        if($_GET['id'] == $panier[$i]->id){

            $panier[$i]->quantite = $panier[$i]->quantite + 1;

        }
    }
}

if($panier == $produits){

    $panier[count($panier)]->id = intval($_GET['id']);
    $panier[count($panier)-1]->quantite = 1;

}

if($panier == null){
    $panier[0]->id = intval($_GET['id']);
    $panier[0]->quantite = 1; 
}

$jsonPanier = json_encode($panier);

$_SESSION['panier'] = $jsonPanier;
var_dump($panier);
var_dump($jsonPanier);

