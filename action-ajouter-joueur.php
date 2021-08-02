<?php
	session_start();

	$pseudo = $_POST["nom-joueur"];

	echo $pseudo;

	$scenario = $_SESSION["scenario"] . ".xml";
	$code = $_SESSION["nomPartie"];

	$xml = simplexml_load_file($scenario);

	$xmlChemin = '//partie[@nom="' . $code . '"]';

	foreach ($xml->xpath($xmlChemin) as $partie) {	    
		$nvJoueur = $partie->addChild('joueur');
    	$nvJoueur->addAttribute('nom', $pseudo);

    	$pattern = array("/é/", "/è/", "/ê/", "/ë/", "/ç/", "/à/", "/â/", "/î/", "/ï/", "/ù/", "/ô/", "/ /");
        $remplace = array("e", "e", "e", "e", "c", "a", "a", "i", "i", "u", "o", "_");
        $pseudo = preg_replace($pattern, $remplace, $pseudo);
        $pseudo = strtolower($pseudo);

		$nvJoueur->addAttribute('id', $pseudo);
		$nvJoueur->addAttribute('orga', '0');
		$nvJoueur->addAttribute('vote', '0');
	}

	$dom = dom_import_simplexml($xml)->ownerDocument;
	$dom->formatOutput = true;
	$dom->preserveWhiteSpace = false;
	$dom->loadXML( $dom->saveXML());
	$dom->save($scenario);

	header("Location: index.php?nomJoueur={$_SESSION["nomJoueur"]}&nomPartie={$_SESSION["nomPartie"]}#orga");
?>