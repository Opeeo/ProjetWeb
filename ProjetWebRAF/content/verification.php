<?php
    session_start();
    $url = parse_url($_SERVER['REQUEST_URI']);
    parse_str($url['query'], $params);

    $verification = file_get_contents("http://localhost:3003/verification/" . $params['mail'] . "/" . $params['code']);

    if($verification == "2") {
      $_SESSION['verificationMail'] = $params['mail'];
		  header('Location: setPassword.php');
		  exit();
    } elseif($verification == "1") {
		  header('Location: wrongLink.php');
		  exit();
    } else {
		  header('Location: error.php');
		  exit();
    }
?>
