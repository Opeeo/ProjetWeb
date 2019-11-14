<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'C:\wamp64\www\vendor\autoload.php';;

	if (!isset($_SESSION['blocked'])) {
		$_SESSION['blocked'] = 0;
	}
	if ($_SESSION['blocked'] == 1 && (time() - $_SESSION['chrono']) < 500) {
		$_SESSION['error'] = 5;
		header('Location: inscription');
		exit();
	}	elseif ($_SESSION['blocked'] == 1) {
		$_SESSION['blocked'] = 0;
	}

	
	
	function generateRandomString($length = 10) {
		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}
	
    $verifcode = generateRandomString();

	$json = file_get_contents("http://localhost:3003/inscription/".$_POST['mail']."/".$_POST['nom']."/".$_POST['prenom']."/".$verifcode);

	if($json == ""){
		$_SESSION['error'] = 1;
		header('Location: inscription');
		exit();
	} elseif($json == "2"){
		$_SESSION['error'] = 2;
		header('Location: inscription');
		exit();
	}

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
		$mail->Password = "onepiece2";
		$mail->SetFrom("2pointdinnterogation@gmail.com");
		$mail->Subject = "BDE CESI Toulouse: Validation d'adresse e-mail";
		$mail->Body = "<p>Plus qu'une derni&egrave;re &eacute;tape pour pouvoir profiter de toutes les fonctionnalit&eacute;s du site ! Cliquez sur le lien suivant pour valider votre adresse e-mail et d&eacute;finir un mot de passe pour votre compte :<br><a href=\"http://localhost/ProjetWeb/verification/" . $_POST['mail'] . "/" . $verifcode . "\">le lien suivant</a><br><br>Bienvenue parmi nous :)</p>";
		$mail->AddAddress($_POST['mail']);

		$mail->Send();
		header('Location: inscription');
		exit();
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		$_SESSION['error'] = 7;
		header('Location: inscription');
		exit();
	}

?>
