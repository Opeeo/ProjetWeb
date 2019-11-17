<!DOCTYPE html>
<html lang="fr">
  <head>
      <?php include("content/head.php") ?>
      <link rel="stylesheet" href="assets/css/panierShop.css">
  </head>
  <body>
    <?php include("content/navbar.php") ?>
    <?php include("content/foot.php") ?>

      <div class="panier clearfix">

        <div class="nom-colonne clearfix">
          <label class="produit-image">Image</label>
          <label class="produit-detail">Produit</label>
          <label class="produit-prix">Prix</label>
          <label class="produit-quantite">Quantité</label>
          <label class="produit-suppr">Supprimer</label>
          <label class="produit-ligne-prix">Total</label>
        </div>
        
        <!-- Produit 1 -->
        <div class="produit clearfix">
          <div class="produit-image">
            <img src="http://placehold.jp/80x120.png">
          </div>
          <div class="produit-detail">
            <div class="produit-nom">Nom</div>
            <p class="produit-desc">Desc</p>
          </div>
          <div class="produit-prix">10.00</div>
            <div class="produit-quantite">
              <input type="number" value="1" min="1">
            </div>
            <div class="produit-suppr">
              <button class="produit-suppression btn-danger btn-sm"><img src="assets/vendors/pictures/letter-x.png" alt="delete" height=15 width=15></button>
          </div>
          <div class="produit-ligne-prix">10.00</div>
        </div>
        
        <!-- Produit 2 -->
        <div class="produit clearfix">
          <div class="produit-image">
            <img src="http://placehold.jp/80x120.png">
          </div>
          <div class="produit-detail">
            <div class="produit-nom">Nom2</div>
            <p class="produit-desc">Desc2</p>
          </div>
          <div class="produit-prix">40.00</div>
            <div class="produit-quantite">
              <input type="number" value="1" min="1">
            </div>
          <div class="produit-suppr">
            <button class="produit-suppression btn-danger btn-sm"><img src="assets/vendors/pictures/letter-x.png" alt="delete" height=15 width=15></button>
          </div>
          <div class="produit-ligne-prix">40.00</div>
        </div>
        
        <!-- Total -->
        <div class="totals">
          <div class="total-produits clearfix">
            <label>Sous-Total</label>
            <div class="total-valeur" id="panier-sous-total">50.00</div>
          </div>
          <div class="total-produits clearfix">
            <label>TVA (20%)</label>
            <div class="total-valeur" id="panier-tva">10.00</div>
          </div>
          <div class="total-produits clearfix total-produit-total">
            <label>Total</label>
            <div class="total-valeur" id="panier-total">60.00</div>
          </div>
        </div>
        <button class="btn btn-success btn-lg btn-block">Paiement</button>
        
      </div>
      <hr>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="content/panierShop.js"></script>
  </body>
</html>
