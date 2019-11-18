<?php
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '..\..\vendor\autoload.php';

	if(!isset($_SESSION['mail'])){
        header('Location: wrongLink.php');
        exit();
    }

	$noCommande = file_get_contents("http://localhost:3003/ajoutCommande/".$_SESSION['id']."/".$_SESSION['panier']."/".$_POST['prixTotal']);

	if($noCommande == ""){
		header('Location: error.php');
		exit();
    }

    $noCommande = json_decode($noCommande);

    $produits = json_decode($_SESSION['panier']);
    $listeArticles = "";

    foreach($produits as $produit) {
        $jsonProduit = file_get_contents("http://localhost:3003/recupProduitById/" . $produit->idProduit);
        $infosProduit = json_decode($jsonProduit);
        $listeArticles .= "-" . $infosProduit[0]->nom . " x" . $produit->quantite . "<br>";
    }

    $listeArticles = str_replace("*", " ", $listeArticles);

    $corpsMail = "<p>Voici le r&eacute;capitulatif de votre commande n&#176;" . $noCommande[0]->id . " :<br><br>" . $listeArticles . "<br>Total d&#251; : " . $_POST['prixTotal'] . "&#8364;<br><br>L'&eacute;quipe du BDE vous contactera pour vous donnez rendez-vous pour vous remettre vos articles et proc&eacute;der au r&egrave;glement !</p>";
    
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
		$mail->Subject = "BDE CESI Toulouse: Confirmation de commande";
		$mail->Body = $corpsMail;
		$mail->AddAddress($_SESSION['mail']);

        $mail->Send();

        $corpsMail2 = "<p>Voici le r&eacute;capitulatif de la commande n&#176;" . $noCommande[0]->id . " &eacute;ffectu&eacute;e par " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " (" . $_SESSION['mail'] . ") :<br><br>" . $listeArticles . "<br>Total d&#251; : " . $_POST['prixTotal'] . "&#8364;</p>";

        $mail2 = new PHPMailer();
		$mail2->IsSMTP();
		$mail2->SMTPDebug = 1;
		$mail2->SMTPAuth = true;
		$mail2->SMTPSecure = 'ssl';
		$mail2->Host = "smtp.gmail.com";
		$mail2->Port = 465;
		$mail2->IsHTML(true);
		$mail2->Username = "2pointdinnterogation@gmail.com";
		$mail2->Password = file_get_contents("C:\password.txt");
		$mail2->SetFrom("2pointdinnterogation@gmail.com");
		$mail2->Subject = "BDE CESI Toulouse: Confirmation de commande";
		$mail2->Body = $corpsMail2;
        $mail2->AddAddress("corentin.paugam@viacesi.fr");
        
        $mail2->Send();

        $_SESSION['panier'] = "[]";
		header('Location: achatConclu.php');
		exit();
	} catch (Exception $e) {
        $_SESSION['panier'] = "[]";
		header('Location: error.php');
		exit();
	}
?>