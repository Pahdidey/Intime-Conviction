<?php
	session_start();

	$idCarte = $_GET['idCarte'];

	$scenario = $_SESSION["scenario"] . ".xml";
	$code = $_SESSION["nomPartie"];

	$xml = simplexml_load_file($scenario);

	$xmlChemin = '//partie[@nom="' . $code . '"]/joueur';

	foreach ($xml->xpath($xmlChemin) as $joueur) {	    
		foreach ($joueur->carte as $carte) {
			if ($carte['id'] == $idCarte) {
				$carte['etat'] = 1;
			}
		}
	}

	$xml->asXML($scenario);

	header("Location: index.php?nomJoueur={$_SESSION["nomJoueur"]}&nomPartie={$_SESSION["nomPartie"]}#jures");
?>