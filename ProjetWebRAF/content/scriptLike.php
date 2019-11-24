<?php

session_start();

if (isset($_GET['like'])) {

    if($_GET['like'] == 1) {

        $response = file_get_contents("http://localhost:3003/inscLike/" . $_GET['idEvent'] . "/" . $_SESSION['id']);

        header("Location: ../pastTargetEvent.php?id=" . $_GET['idEvent']);

    }

    elseif ($_GET ['like'] == 2) {

        $response = file_get_contents("http://localhost:3003/desinscLike/" . $_GET['idEvent'] . "/" . $_SESSION['id']);

        header("Location: ../pastTargetEvent.php?id=" . $_GET['idEvent']);

    }

}

else {

    echo "ERROR : something went wrong";

}
