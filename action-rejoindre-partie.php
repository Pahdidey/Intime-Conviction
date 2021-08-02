<?php
	session_start();
	
	$scenario = $_POST['scenario'] . '.xml';
	$code = $_POST['code-liste'];
	$pseudo = $_POST['nom-joueur'];

	if (!empty($_POST)) {
		$partiesJeu  =  simplexml_load_file($scenario);
		$i = 0;
		foreach ($partiesJeu as $partie) {
			if ($partie['nom'] == $code) {
				foreach ($partie->joueur as $joueur) {
					if ($joueur['nom'] == $pseudo) {

						$pattern = array("/é/", "/è/", "/ê/", "/ë/", "/ç/", "/à/", "/â/", "/î/", "/ï/", "/ù/", "/ô/", "/ /");
	                    $remplace = array("e", "e", "e", "e", "c", "a", "a", "i", "i", "u", "o", "_");
	                    $pseudo = preg_replace($pattern, $remplace, $pseudo);
	                    $pseudo = strtolower($pseudo);

	                    $_SESSION["partie"] = "rejointe";
	                    $_SESSION["scenario"] = $_POST['scenario'];
						$_SESSION["nomPartie"] = $code;
						$_SESSION["nomJoueur"] = $pseudo;

						$i++;

						header("Location: index.php?nomJoueur={$pseudo}&nomPartie={$code}");
					}
				}
				
			}
		}
		if ($i == 0) {
			$_SESSION["partie"] = "inconnue";
			header("Location: index.php");
		}
	}
?>