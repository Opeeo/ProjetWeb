<?php

session_start();

file_get_contents("http://localhost:3003/addComs/". $_POST['contenu'] ."/". $_GET['photoid'] ."/" . $_SESSION['id'] ."/" . date('Y-m-d'));

header("Location: ../pastTargetEvent.php?id=" . $_GET['eventid']);
exit();