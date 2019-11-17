<?php

session_start();

$contenu = str_replace(" ", "*" , $_POST['contenu']);

$request = file_get_contents("http://localhost:3003/addComs/". $contenu ."/". $_GET['photoid'] ."/" . $_SESSION['id'] ."/" . date('Y-m-d'));

echo "http://localhost:3003/addComs/". $contenu ."/". $_GET['photoid'] ."/" . $_SESSION['id'] ."/" . date('Y-m-d');


header("Location: ../pastTargetEvent.php?id=" . $_GET['eventid']);
exit();