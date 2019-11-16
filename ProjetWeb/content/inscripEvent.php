<?php
session_start();
$result = file_get_contents("http://localhost:3003/inscEvent/" . $_GET['id'] . "/" . $_SESSION['id']);

header('Location: ../futureTargetEvent.php');