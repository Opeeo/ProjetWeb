<?php

if(isset($_POST['eventRecurrence'])) {
    $rec = 1;
} else {
    $rec = 0;
}

$name = str_replace(" ", "*", $_POST['eventName']);

$lien = str_replace("/", "*", $_POST['eventImage']);

$desc = str_replace(" ", "*", $_POST['eventDesc']);

file_get_contents("http://localhost:3003/addEvent/" . $name . "/" . $_POST['eventDate'] . "/" . $desc . "/" . $_POST['eventPrice'] . "/" . $lien . "/" . $rec);

echo "http://localhost:3003/addEvent/" . $_POST['eventName'] . "/" . $_POST['eventDate'] . "/" . $desc . "/" . $_POST['eventPrice'] . "/" . $lien . "/" . $rec;

header("location: ../index.php");
exit();

?>
