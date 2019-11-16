<?php
    session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '..\..\vendor\autoload.php';
    
    if(isset($_SESSION['mail']) || !isset($_SESSION['corpsMail'])){
        header('Location: wrongLink.php');
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
		$mail->Password = file_get_contents("C:\password.txt");
		$mail->SetFrom("2pointdinnterogation@gmail.com");
		$mail->Subject = "BDE CESI Toulouse: Validation d'adresse e-mail";
		$mail->Body = $_SESSION['corpsMail'];
		$mail->AddAddress($_SESSION['mailConfirmation']);

		$mail->Send();
		header('Location: verifRegister.php');
		exit();
	} catch (Exception $e) {
		header('Location: error.php');
		exit();
	} ?>