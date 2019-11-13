<?php

/*
 *  TODO: Implémenter les variable de session
 *
 *  Variable de session utilisées ici :
 *      - 'logged' - Utilisé pour savoir si l'utilisateur est connecté
 *      - 'username' - Utilisé pour récupérer le nom et prenom de l'utilisateur
 *
 *
 */



    //Exemple :

    $_SESSION['logged'] = false;

    $_SESSION['username'] = 'Gabriel RICARD';

?>

<nav style="background-color: black; padding-top: 0px; padding-bottom: 0px" class="navbar navbar-expand-lg navbar-custom navbar-dark fixed-top">
    <a style="margin-right: 60px" class="navbar-brand" href="#">
        <img src="assets/vendors/pictures/CesiLogo.jpg" height="40">
        <span style="margin-left: 10px">BDE - Toulouse</span>
    </a>


    <button style="margin-left: 0px" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Boutique</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Evénement
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Evénement à venir</a>
                    <a class="dropdown-item" href="#">Evénement passés</a>
                </div>
            </li>

            <div style="margin-left: 50px"></div>

            <?php

            if(isset($_SESSION['logged'])) {
                if($_SESSION['logged'] === true) {
                    echo "
                    
            <div class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    " . $_SESSION['username'] . "
                </a>
                <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                    <a class=\"dropdown-item\" href=\"#\">Mon profil</a>
                    <a class=\"dropdown-item\" href=\"#\">Mon panier</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"#\">Se déconnecter</a>
                </div>
            </div>
                    
                    ";
                } else {

                    echo "
                    
            <li class=\"register\">
                <span style=\"display: inline-block\">
                    <a class=\"nav-link\" href=\"index.php\">
                        Register
                    </a>
                </span>
            </li>
            <li class=\"login\">
                <span style=\"display: inline-block\">
                    <a class=\"nav-link\" href=\"content/login.php\">
                        Log in
                    </a>
                </span>
            </li>
                    
                    ";
                }
            } else {

                echo "
                
            <li class=\"register\">
                <span style=\"display: inline-block\">
                    <a class=\"nav-link\" href=\"index.php\">
                        Register
                    </a>
                </span>
            </li>
            <li class=\"login\">
                <span style=\"display: inline-block\">
                    <a class=\"nav-link\" href=\"index.php\">
                        Log in
                    </a>
                </span>
            </li>
                
                ";

            }

            ?>

        </ul>
    </div>
</nav>