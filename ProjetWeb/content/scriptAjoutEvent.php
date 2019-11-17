<?php

if(isset($_POST['eventRecurrence'])) {
    $rec = 1;
} else {
    $rec = 0;
}

$lien = str_replace("/", "*", $_POST['eventImage']);

file_get_contents("http://localhost:3003/addEvent/" . $_POST['eventName'] . "/" . $_POST['eventDate'] . "/" . $_POST['eventDesc'] . "/" . $_POST['eventPrice'] . "/" . $lien . "/" . $rec);
