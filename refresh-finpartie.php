<?php
    session_start();

	$scenario = $_SESSION["scenario"] . ".xml";
	$code = $_SESSION["nomPartie"];

	$xml = simplexml_load_file($scenario);

	$xmlChemin = '//partie[@nom="' . $code . '"]';

	foreach ($xml->xpath($xmlChemin) as $partie) {	
		if ($partie['resultat'] != '0') {
			echo "fini";
		}
	}
?>