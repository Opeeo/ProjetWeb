<?php
    
    $produits = json_decode($_SESSION['panier']);
    echo '
    <script type="text/javascript">
      panierJS = JSON.parse(\'' . $_SESSION['panier'] . '\');
    </script>';
    foreach($produits as $produit) {
        $jsonProduit = file_get_contents("http://localhost:3003/recupProduitById/" . $produit->idProduit);
        $infosProduit = json_decode($jsonProduit);

        $img = str_replace("*", "/", $infosProduit[0]->img);
        $name = str_replace("*", " ", $infosProduit[0]->nom);

        if($infosProduit == "") {
         echo' <script type="text/javascript">
            window.location.href = \'content/error.php\';
          </script>';
        } else {

        echo '
        <div class="produit clearfix" id="' . $produit->idProduit . '">
          <div class="produit-image">
            <img src="' . $img . '">
          </div>
          <div class="produit-detail">
            <div class="produit-nom">' . $name . '</div>
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
        </div>';}
} ?>