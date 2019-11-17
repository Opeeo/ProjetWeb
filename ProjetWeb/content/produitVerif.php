<?php
    $_SESSION['panier'] = "[{\"id\":2,\"quantite\":2},{\"id\":1,\"quantite\":1}]";
    $produits = json_decode($_SESSION['panier']);
    foreach($produits as $produit) {
        
        $jsonProduit = file_get_contents("http://localhost:3003/recupProduit/" . $produit[0]->id);
        $infosProduit = json_decode($jsonProduit);

        echo '
        <div class="produit clearfix">
        <div class="produit-image">
          <img src="' . $infosProduit[0]->prix . '">
        </div>
        <div class="produit-detail">
          <div class="produit-nom">' . $infosProduit[0]->nom . '</div>
          <p class="produit-desc">Desc</p>
        </div>
        <div class="produit-prix">' . $infosProduit[0]->prix . '</div>
          <div class="produit-quantite">
            <input type="number" value="' . $produit[0]->quantite . '" min="1" max="' . $infosProduit[0]->quantite . '">
          </div>
          <div class="produit-suppr">
            <button class="produit-suppression btn-danger btn-sm"><img src="assets/vendors/pictures/letter-x.png" alt="delete" height=15 width=15></button>
        </div>
        <div class="produit-ligne-prix">' . $infosProduit[0]->prix . '</div>
      </div>';
            
} ?>