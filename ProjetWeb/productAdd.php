<?php session_start();?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <?php include("content/head.php") // importation du head (stylesheet custom et FrameWork)  ?>
        <link rel="stylesheet" href="assets/css/productAdd.css"/>
        <title>BDE Cesi Toulouse</title>
    </head>

    <body>

        <?php include("content/navbar.php") // Importation du header / Navbar  ?>

        <main role="main" class="container">
            <?php include "content/productAddForm.php"; // Code HTML du formulaire d'ajout de produit  ?>
        </main>

        <?php include("content/foot.php") // Importation du footer  ?>

        <!-- Bootstrap core JavaScript, JQuerry, Poppers-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
