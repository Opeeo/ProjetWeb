<?php
    $produits = json_decode($_SESSION['panier']);
    foreach($produits as $produit) {
        
        $jsonProduit = file_get_contents("http://localhost:3003/recupProduit/" . $produit->id);
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
            <input type="number" value="' . $produit->quantite . '" min="1" max="' . $infosProduit[0]->quantite . '">
          </div>
          <div class="produit-suppr">
            <button class="produit-suppression btn-danger btn-sm"><img src="assets/vendors/pictures/letter-x.png" alt="delete" height=15 width=15></button>
        </div>
        <div class="produit-ligne-prix">' . $infosProduit[0]->prix . '</div>
      </div>';
            
} ?>