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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
