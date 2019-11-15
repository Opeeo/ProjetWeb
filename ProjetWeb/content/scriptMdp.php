<?php

    session_start();

    if(!isset($_SESSION['verificationMail'])){
        header('Location: wrongLink');
        exit();
    }

    $option = [
        'cost' => 12,
    ];

    $hashpass = password_hash($_POST['inputPassword'], PASSWORD_BCRYPT, $option);

    while(strpos($hashpass, '/')){
        $hashpass = password_hash($_POST['inputPassword'], PASSWORD_BCRYPT, $option);
    }

    $reponse = file_get_contents("http://localhost:3003/validation/".$_SESSION['verificationMail']."/".$hashpass);

    unset($_SESSION['verificationMail']);

    if($reponse == "2"){;
		header('Location: mdpChange');
		exit();
	} else {
        header('Location: error');
        exit();
    }
?>