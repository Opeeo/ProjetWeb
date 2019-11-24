<?php

file_get_contents("http://localhost:3003/deleteComs/". $_GET['idcoms']);

header("Location: ../pastTargetEvent.php?id=". $_GET['idevent']);
exit;