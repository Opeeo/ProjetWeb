<?php

file_get_contents("http://localhost:3003/deletePhoto/". $_GET['idimage']);

header("Location: ../pastTargetEvent.php?id=". $_GET['idevent']);
exit;