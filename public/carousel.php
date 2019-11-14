<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap Carousel</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div id="carouselExemple" class="carousel slide" data-ride="carousel" data-interval="3000">

    <ol class="carousel-indicators">
        <li data-target="#carouselExemple" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExemple" data-slide-to="1"></li>
        <li data-target="#carouselExemple" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
    <?php


    // Accès à un fichier HTTP avec les entêtes HTTP indiqués ci-dessus
    $json = file_get_contents("http://localhost:3003/recupPhoto");
    $recupPhoto = json_decode($json);

    for ( $i = 0 ; $i < count($recupPhoto); $i++) {

        $photo[$i] = $recupPhoto[$i]->url;
        $description[$i] = $recupPhoto[$i]->description;

    }

    echo ("<div class='carousel-item active'>
                <img src= " . $photo[0] . "
                 class='d-block'>
                 <div class='carousel-caption d-none d-md-block'>
                     <h5>" . $description[0] ."</h5>
                     <p>La description de la photo</p>
                 </div>
              </div>");

    for ( $i = 1 ; $i < count($photo); $i++){

        echo ("<div class='carousel-item'>
                <img src= " . $photo[$i] . "
                 class='d-block'>
                 <div class='carousel-caption d-none d-md-block'>
                     <h5>" . $description[$i] . "</h5>
                     <p>La description de la photo</p>
                 </div>
              </div>");
    }
    ?>
    </div>

    <a href="#carouselExemple" class="carousel-control-prev" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a href="#carouselExemple" class="carousel-control-next" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>


<script>
    $('.carousel').carousel({

        pause: "null"

    })
</script>
</body>

</html>