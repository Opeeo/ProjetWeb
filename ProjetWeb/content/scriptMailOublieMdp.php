<?php
    session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '..\..\vendor\autoload.php';
    
    if(isset($_SESSION['mail'])){
        header('Location: wrongLink.php');
        exit();
    }

    function generateRandomString($length = 10) {
		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}
	
    $verifcode = generateRandomString();


	$reponse = file_get_contents("http://localhost:3003/oublieMdp/".$_POST['inputEmail']."/".$verifcode);

	if($reponse == "1"){
		header('Location: wrongLink.php');
		exit();
	} elseif($reponse == ""){
		header('Location: error.php');
		exit();
	}

    $_SESSION['corpsMail'] = "<p>Cliquez sur le lien suivant pour r&eacute;initialiser votre mot de passe :<br><a href=\"http://localhost/ProjetWeb/content/verification.php?mail=" . $_POST['inputEmail'] . "&code=" . $verifcode . "\">le lien suivant</a><br><br></p>";

    try {
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->IsHTML(true);
		$mail->Username = "2pointdinnterogation@gmail.com";
		$mail->Password = file_get_contents("C:\password.txt");
		$mail->SetFrom("2pointdinnterogation@gmail.com");
        $mail->Subject = "BDE CESI Toulouse: Oubli mot de passe";
		$mail->Body = $_SESSION['corpsMail'];
		$mail->AddAddress($_POST['inputEmail']);

		$mail->Send();
		header('Location: verifReinit.php');
		exit();
	} catch (Exception $e) {
		header('Location: error.php');
		exit();
	} ?>