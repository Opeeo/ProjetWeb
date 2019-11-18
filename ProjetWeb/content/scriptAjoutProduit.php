<?php

$name = str_replace(" ", "*", $_POST['productName']);
$img = str_replace("/", "*", $_POST['productImage']);

file_get_contents("http://localhost:3003/addProduct/". $name ."/". $_POST['productPrice'] ."/". $_POST['productQuantity'] ."/". $img ."/". $_POST['productCategory']);

header("Location: ../boutique.php");
exit();
