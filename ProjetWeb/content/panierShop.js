
$(document).ready(function() {
 
    /* Taxe & ratio de fade */
    var tauxTVA = 0.20;
    var fadeTime = 300;

    /* Assigne la fonction update ou delete */
    $('.produit-quantite input').on("change", function() {
      updateQuantite(this);
    });

    $('.produit-suppr button').click( function() {
      suppresionProduit(this);
    });


    /* Recalcul le panier */
    function recalculPanier()
    {
      var sousTotal = 0;
       
      /* Addition de chaque tuples */
      $('.produit').each(function () {
        sousTotal += parseFloat($(this).children('.produit-ligne-prix').text());
      });
       
      /* Calcul des totaux */
      var ttc = sousTotal * tauxTVA;
      var total = sousTotal + ttc;
       
      /* Update totals display */
      $('.total-valeur').fadeOut(fadeTime, function() {
        $('#panier-sous-total').html(sousTotal.toFixed(2));
        $('#panier-tva').html(ttc.toFixed(2));
        $('#panier-total').html(total.toFixed(2));
        if(total == 0){
            $('.paiement').fadeOut(fadeTime);
        }else{
            $('.paiement').fadeIn(fadeTime);
        }
        $('.total-valeur').fadeIn(fadeTime);
      });
    }
     
     
    /* Update quantite */
    function updateQuantite(quantiteInput)
    {
      /* Calcule le prix de ligne-prix */
      var ligneProduit = $(quantiteInput).parent().parent();
      var prix = parseFloat(ligneProduit.children('.produit-prix').text());
      var quantite = $(quantiteInput).val();
      var lignePrix = prix * quantite;
       
      /* Update les ligne-prix et recalcule le total panier */
      ligneProduit.children('.produit-ligne-prix').each(function () {
        $(this).fadeOut(fadeTime, function() {
            $(this).text(lignePrix.toFixed(2));
            recalculPanier();
            $(this).fadeIn(fadeTime);
        });
      });  
    }
     
    /* Delete le produit du panier sur demande */
    function suppresionProduit(removeButton)
    {
      /* Delete la ligne produit de l'interface & recalcule le total panier */
      var ligneProduit = $(removeButton).parent().parent();
      ligneProduit.slideUp(fadeTime, function() {
        ligneProduit.remove();
        recalculPanier();
      });
    }
    $('.produit-quantite input').trigger("change");
});