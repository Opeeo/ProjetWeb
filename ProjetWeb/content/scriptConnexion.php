<?php
	session_start();

	if(!isset($_POST['inputEmail'])){
        header('Location: wrongLink');
        exit();
    }

	if (!isset($_SESSION['blocked'])) {
		$_SESSION['blocked'] = 0;
	}
	if ($_SESSION['blocked'] == 1 && (time() - $_SESSION['chrono']) < 500) {
		$_SESSION['error'] = 5;
		header('Location: connexion');
		exit();
	}	elseif ($_SESSION['blocked'] == 1) {
		$_SESSION['blocked'] = 0;
	}

	$json = file_get_contents("http://localhost:3003/connexion/".$_POST['inputEmail']);

	if($json == ""){
		$_SESSION['error'] = 1;
		header('Location: connexion');
		exit();
	} elseif($json == "1"){
		$_SESSION['error'] = 6;
		header('Location: connexion');
		exit();
	}

	$reponse = json_decode($json);

	if($reponse[0]->statut == "0"){
		$_SESSION['error'] = 8;
		header('Location: connexion');
		exit();
	}

	if (password_verify($_POST['inputPassword'], $reponse[0]->mdp)) {
		$_SESSION['mail'] = $reponse[0]->mail;
		$_SESSION['statut'] = $reponse[0]->statut;
		$_SESSION['nom'] = $reponse[0]->nom;
		$_SESSION['prenom'] = $reponse[0]->prenom;
		$_SESSION['centre'] = $reponse[0]->centre;
		$_SESSION['panier'] = $reponse[0]->panier;
		$_SESSION['error'] = 0;
		if (!isset($_SESSION['loginFails'])) {
			$_SESSION['loginFails'] = 0;
		}
		header('Location: ..\index');
		exit();
	} else {
		if (!isset($_SESSION['loginFails'])) {
			$_SESSION['loginFails'] = 1;
		} else {
			$_SESSION['loginFails']++;
			if ($_SESSION['loginFails'] >= 3) {
				$_SESSION['error'] = 4;
				header('Location: connexion');
				exit();
			}
		}
		$_SESSION['error'] = 3;
		header('Location: connexion');
		exit();
	}
?>