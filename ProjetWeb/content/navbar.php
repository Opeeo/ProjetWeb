<?php if(!isset($_SESSION)) 
    { 
        session_start();
    } ?>

<!DOCTYPE html>

<nav style="background-color: black; padding-top: 0px; padding-bottom: 0px" class="navbar navbar-expand-lg navbar-custom navbar-dark fixed-top">
    <a style="margin-right: 60px" class="navbar-brand" href="index.php">
        <img src="assets/vendors/pictures/CesiLogo.jpg" height="40">
        <span style="margin-left: 10px">BDE Cesi - Toulouse</span>
    </a>


    <button style="margin-left: 0px" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./index.php">Accueil</a>
            </li>
            <?php

            if(isset($_SESSION['mail'])) {
                if($_SESSION['statut'] == 3) {
                    echo "
                    
                    <li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                            Boutique
                        </a>
                        
                        <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                            <a class=\"dropdown-item\" href=\"boutique.php?index=1\">Accéder à la boutique</a>
                            <div class=\"dropdown-divider\"></div>
                            <a class=\"dropdown-item\" href=\"productAdd.php\">Ajouter un produit</a>
                        </div>
                    </li>
                    
                    ";
                }else {
                    echo "
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"./boutique.php?index=1\">Boutique</a>
                    </li>
                    ";
                }
            } else {
                echo "
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"./boutique.php?index=1\">Boutique</a>
                </li>
                ";
            }

            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Evénement
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="futureEvent.php">Evénement à venir</a>
                    <a class="dropdown-item" href="pastEvent.php">Evénement passés</a>


                    <?php
                        if(isset($_SESSION['mail'])) {
                            if($_SESSION['statut'] == 3) {
                                echo "<div class=\"dropdown-divider\"></div><a class=\"dropdown-item\" href=\"eventAdd.php\">Ajouter événement</a>";
                            }
                        }
                    ?>


                </div>
            </li>
            <p class="nav-esteregg data-toggle="tooltip" data-placement="bottom" title="Point faible ? Trop fort.">o</p>

            <div style="margin-left: 50px"></div>

            <?php

            if(isset($_SESSION['mail'])) {
                    echo "
                    
            <div class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    " . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "
                </a>
                <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                    <a class=\"dropdown-item\" href=\"#\">Mon profil</a>
                    <a class=\"dropdown-item\" href=\"panierShop.php\">Mon panier</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"content/deconnexion.php\">Se déconnecter</a>
                </div>
            </div>
                    
                    ";
                } else {

                    echo "
                    
            <li class=\"register\">
                <span style=\"display: inline-block\">
                    <a class=\"nav-link\" href=\"content/inscription.php\">
                        Inscription
                    </a>
                </span>
            </li>
            <li class=\"login\">
                <span style=\"display: inline-block\">
                    <a class=\"nav-link\" href=\"content/connexion.php\">
                        Connexion
                    </a>
                </span>
            </li>
                    
                    ";
                }
            ?>

        </ul>
    </div>
</nav>
