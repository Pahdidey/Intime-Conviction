<?php
	session_start();

	$nomJoueur = $_SESSION["nomJoueur"];

	$scenario = $_SESSION["scenario"] . ".xml";
	$code = $_SESSION["nomPartie"];

	$vote = $_POST['vote'];

	$xml = simplexml_load_file($scenario);

	$xmlChemin = '//partie[@nom="' . $code . '"]/joueur';

	foreach ($xml->xpath($xmlChemin) as $joueur) {	
		if ($joueur['id'] == $nomJoueur) {
			$joueur['vote'] = $vote;
		}
	}

	$xml->asXML($scenario);

	header("Location: resultat-vote.php?nomJoueur={$_SESSION["nomJoueur"]}&nomPartie={$_SESSION["nomPartie"]}&vote={$vote}#vote");
?>