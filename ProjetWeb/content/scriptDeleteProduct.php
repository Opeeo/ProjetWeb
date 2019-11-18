<?php

$res = file_get_contents("http://localhost:3003/deleteProduct/". $_GET['id']);


header("Location: ../boutique.php?index=1");
exit();

