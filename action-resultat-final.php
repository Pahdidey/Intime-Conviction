<?php
	session_start();

	$scenario = $_SESSION["scenario"] . ".xml";
	$code = $_SESSION["nomPartie"];

	$xml = simplexml_load_file($scenario);

	$xmlChemin = '//partie[@nom="' . $code . '"]';

	foreach ($xml->xpath($xmlChemin) as $partie) {	
		$coupable = 0;
		$nonCoupable = 0;

		foreach ($partie->joueur as $joueur) {
			if ($joueur['vote'] == 'coupable') {
				$coupable++;
			} elseif ($joueur['vote'] == 'non-coupable') {
				$nonCoupable++;
			}
		}
		
		if ($coupable > $nonCoupable) {
			$partie['resultat'] = "coupable";
		} elseif ($nonCoupable > $coupable) {
			$partie['resultat'] = "non-coupable";
		} else {
			$partie['resultat'] = "egalite";
			foreach ($partie->joueur as $joueur) {
				$joueur['vote'] = '0';
			}
		}
	}

	$xml->asXML($scenario);

	header("Location: resultat-final.php?nomJoueur={$_SESSION["nomJoueur"]}&nomPartie={$_SESSION["nomPartie"]}#vote");
?>