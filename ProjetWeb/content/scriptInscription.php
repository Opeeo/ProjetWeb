<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '..\..\vendor\autoload.php';

	if(!isset($_POST['inputEmail'])){
        header('Location: wrongLink');
        exit();
    }

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

	$json = file_get_contents("http://localhost:3003/inscription/".$_POST['inputEmail']."/".$_POST['inputName']."/".$_POST['inputFirstName']."/".$verifcode);

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
		$_SESSION['corpsMail'] = "<p>Plus qu'une derni&egrave;re &eacute;tape pour pouvoir profiter de toutes les fonctionnalit&eacute;s du site ! Cliquez sur le lien suivant pour valider votre adresse e-mail et d&eacute;finir un mot de passe pour votre compte :<br><a href=\"http://localhost/ProjetWeb/content/verification?mail=" . $_POST['inputEmail'] . "&code=" . $verifcode . "\">le lien suivant</a><br><br>Bienvenue parmi nous :)</p>";
		$_SESSION['mailConfirmation'] = $_POST['inputEmail'];

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
		$mail->Subject = "BDE CESI Toulouse: Validation d'adresse e-mail";
		$mail->Body = $_SESSION['corpsMail'];
		$mail->AddAddress($_POST['inputEmail']);

		$mail->Send();
		header('Location: verifRegister');
		exit();
	} catch (Exception $e) {
		$_SESSION['error'] = 7;
		header('Location: inscription');
		exit();
	}

?>
