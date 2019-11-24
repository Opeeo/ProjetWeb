<?php
    session_start();
    $_SESSION['panier'] = $_POST['data'];
    $reponse = file_get_contents("http://localhost:3003/updatePanier/".$_SESSION['id']."/".$_SESSION['panier']);
    if($reponse != 1) {
        header("Location: error.php");
    }
?>