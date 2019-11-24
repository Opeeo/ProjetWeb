<?php
session_start();
var_dump($_SESSION['panier']);
$produits = json_decode($_SESSION['panier']);


var_dump($produits);

$panier = [];


if($_SESSION['panier'] != "[]"){

    for($i = 0; $i < count($produits); $i++){
        
        $panier[$i]->idProduit = $produits[$i]->idProduit;
        $panier[$i]->quantite = $produits[$i]->quantite;
    

    } 
   // $panier = $prodits;
}

if($_SESSION['panier'] != "[]"){
    for($i = 0 ; $i < count($produits); $i++){
        if($_GET['id'] == $panier[$i]->idProduit){

            $panier[$i]->quantite = $panier[$i]->quantite + 1;
            $panier[$i]->idProduit = $panier[$i]->idProduit;

        }
    }
}

if($panier == $produits){

    $panier[count($panier)]->quantite = 1;
    $panier[count($panier)-1]->idProduit = intval($_GET['id']);


}

if($panier == null){
    $panier[0]->quantite = 1; 
    $panier[0]->idProduit = intval($_GET['id']);

}

$jsonPanier = json_encode($panier);

$_SESSION['panier'] = $jsonPanier;
$reponse = file_get_contents("http://localhost:3003/updatePanier". "/" . $_SESSION['id'] . "/" . $jsonPanier);
/*if($reponse != 1){
    header('Location: wrongLink.php');
}*/
header('Location: ../panierShop.php');
var_dump($_SESSION['panier']);
var_dump($panier);
var_dump($jsonPanier);

