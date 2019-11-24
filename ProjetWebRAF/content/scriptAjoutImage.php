<?php

session_start();

$lien = str_replace("/", "*", $_POST['lien']);

echo file_get_contents("http://localhost:3003/addPhoto/". $lien ."/". $_GET['eventid'] ."/" . $_SESSION['id']);


header("location: ../pastTargetEvent.php?id=" . $_GET['eventid']);
exit();
