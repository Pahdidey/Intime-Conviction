<?php
	session_start();

	$scenario = $_POST['scenario'] . '.xml';
	

	if (!empty($_POST)) {
	    $file = $scenario;
	    $xml = simplexml_load_file($file);
	    $xml->Users;

	    $chaine = 'abcdefghijklmnopqrstuvwxyz';
	    $chaine .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
		$chaine .= '1234567890'; 
		$code = ''; 

		for ($i=0; $i < 5; $i++) { 
			$code .= substr($chaine,rand()%(strlen($chaine)),1); 
		}

		$nvPartie = $xml->addChild('partie');
		$nvPartie->addAttribute('nom', $code);
		$nvPartie->addAttribute('resultat', '0');


		$joueur = $_POST['joueur'];

		$i = 0;

	    foreach ($joueur as $pseudo) {
	    	$nvJoueur = $nvPartie->addChild('joueur');
	    	$nvJoueur->addAttribute('nom', $pseudo);

	    	$pattern = array("/é/", "/è/", "/ê/", "/ë/", "/ç/", "/à/", "/â/", "/î/", "/ï/", "/ù/", "/ô/", "/ /");
	        $remplace = array("e", "e", "e", "e", "c", "a", "a", "i", "i", "u", "o", "_");
	        $pseudo = preg_replace($pattern, $remplace, $pseudo);
	        $pseudo = strtolower($pseudo);

			$nvJoueur->addAttribute('id', $pseudo);

			if ($i == 0) {
				$nvJoueur->addAttribute('orga', '1');
			} else {
				$nvJoueur->addAttribute('orga', '0');
			}

			$nvJoueur->addAttribute('vote', '0');

			$i++;
	    }

	    $x = 1;

	    while ($x <= 12) {
	    	$xmlChemin = '//partie[@nom="' . $code . '"]/joueur[@nom="' . $joueur[$x % $i] . '"]';
	    	$cartes = $xml->xpath($xmlChemin);
	    	$nvCarte = $cartes[0]->addChild('carte');
	    	$nvCarte->addAttribute('id', $x);
	    	$nvCarte->addAttribute('etat', '0');

	    	$x++;
	    }

		$dom = dom_import_simplexml($xml)->ownerDocument;
		$dom->formatOutput = true;
		$dom->preserveWhiteSpace = false;
		$dom->loadXML( $dom->saveXML());
		$dom->save($file);

		$pattern = array("/é/", "/è/", "/ê/", "/ë/", "/ç/", "/à/", "/â/", "/î/", "/ï/", "/ù/", "/ô/", "/ /");
	    $remplace = array("e", "e", "e", "e", "c", "a", "a", "i", "i", "u", "o", "_");
	    $pseudo = preg_replace($pattern, $remplace, $joueur[0]);
	    $pseudo = strtolower($pseudo);

	    $_SESSION["partie"] = "nouvelle";
	    $_SESSION["scenario"] = $_POST['scenario'];
		$_SESSION["nomPartie"] = $code;
	    $_SESSION["nomJoueur"] = $pseudo;

		header("Location: index.php?nomJoueur={$pseudo}&nomPartie={$code}");
	}
?>