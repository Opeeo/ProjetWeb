<?php 
		start_session();
		if (!isset($_SESSION['error'])) {
			$_SESSION['error'] = 0;
		}
		switch ($_SESSION['error']) {
		case 1:
			echo "<script>alert(\"La connexion à la base de données à échouée\")</script>";
			$_SESSION['error'] = 0;
			break;
		case 2:
			echo "<script>alert(\"Cette adresse e-mail est déjà liée à un compte !\")</script>";
			$_SESSION['error'] = 0;
			break;
		case 3:
			echo "<script>alert(\"Mauvais mot de passe ! Tentatives restantes :" . (3 - $_SESSION['loginFails']) . "\")</script>";
			$_SESSION['error'] = 0;
			break;
		case 4:
			echo "<script>alert(\"Trop de tentatives infrusctueuses ! Veuillez patienter.\")</script>";
			$_SESSION['error'] = 0;
			$_SESSION['blocked'] = 1;
			$_SESSION['chrono'] = time();
			$_SESSION['loginFails'] = 0;
			break;
		case 5:
			echo "<script>alert(\"Il reste  " . date("i:s", 300 - (time() - $_SESSION['chrono'])). " minutes avant la prochaine tentative!\")</script>";
			$_SESSION['error'] = 0;
			break;
		case 6:
			echo "<script>alert(\"Il n'existe aucun compte avec cette adresse e-mail !\")</script>";
			$_SESSION['error'] = 0;
			break;
		case 7:
			echo "<script>alert(\"Une erreur est survenue lors de l'envoi de l'e-mail de vérification !\")</script>";
			$_SESSION['error'] = 0;
			break;
	} ?>