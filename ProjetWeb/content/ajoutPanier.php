<?php
    session_start();
    $produits = json_decode($_SESSION['panier']);

    $panier = [];

    if($_SESSION['panier'] != "[]"){

        $panier = $produits;

        for($i = 0 ; $i < count($produits); $i++){
            if($_GET['id'] == $panier[$i]->idProduit){
                $temp = $produits[$i]->quantite;
                $produits[$i]->quantite++;
            }
        }
    }

    if($panier == $temp){

        $panier[count($panier)-1]->quantite = 1;
        $panier[count($panier)-1]->idProduit = intval($_GET['id']);

    }

    $jsonPanier = json_encode($panier);

    $_SESSION['panier'] = $jsonPanier; 
    $reponse = file_get_contents("http://localhost:3003/updatePanier/" . $_SESSION['id'] . "/" . $_SESSION['panier']);
    if($reponse != 1) {
        header("Location: error.php");
    }
?>