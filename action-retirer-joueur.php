<?php
	session_start();

	$joueurSupp = $_POST["retrait"];

	$scenario = $_SESSION["scenario"] . ".xml";
	$code = $_SESSION["nomPartie"];

	$xml = simplexml_load_file($scenario);

	$xmlChemin = '//partie[@nom="' . $code . '"]/joueur';

	foreach ($xml->xpath($xmlChemin) as $joueur) {	   
		if ($joueurSupp == $joueur["id"]) {
			unset($joueur[0]);
		}
	}

	$dom = dom_import_simplexml($xml)->ownerDocument;
	$dom->formatOutput = true;
	$dom->preserveWhiteSpace = false;
	$dom->loadXML( $dom->saveXML());
	$dom->save($scenario);

	header("Location: index.php?nomJoueur={$_SESSION["nomJoueur"]}&nomPartie={$_SESSION["nomPartie"]}#orga");
?>