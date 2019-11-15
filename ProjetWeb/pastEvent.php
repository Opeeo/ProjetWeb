<?php

    include "content/displayPastEvent.php";

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php include("content/head.php") ?>
        <link rel="stylesheet" href="assets/css/futureEvent.css">
        <title>BDE Cesi Toulouse</title>
    </head>

    <body>

        <?php include("content/navbar.php") ?>

        <main role="main" class="container text-center">
            <?php displayPastEvent("Excursion à la plage", "https://www.w3schools.com/howto/img_snow.jpg", "14/12/2019",1); ?>
            <?php displayPastEvent("Balade au Sahara", "https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500", "21/11/2019", 15); ?>
            <?php displayPastEvent("Corentin", "COCO.jpg", "21/11/2019", 90); ?>
            <?php displayPastEvent("Thibault", "https://cdn.discordapp.com/attachments/492604256252067840/634013752076795921/wallpaper_ful_hd_16-9.png", "21/12/2019",8); ?>
        </main>

        <?php include("content/foot.php") ?>

        <!-- Bootstrap core JavaScript, JQuerry, Poppers-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

