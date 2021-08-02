<?php session_start(); ?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Intime Conviction - vote final</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="robots" content="noindex, nofollow" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <link rel="stylesheet" href="./css/reset.css">
	    <link rel="stylesheet" href="./css/styles.css<?php echo "?".rand();?>">
	     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
	    <!--<script type="text/javascript" src="./../js/jquery-3.6.0.min.js"></script>-->
	    <script type="text/javascript" src="./js/scripts.js<?php echo "?".rand();?>"></script>	
	</head>
	<body>
		<?php include('notifs.php'); ?>
		<?php
			if ($_SESSION["scenario"] == 'poissons-chine') {
				$titreScenario = "L'Affaire des Poissons de Chine";
			} elseif ($_SESSION["scenario"] == 'passeur') {
				$titreScenario = "L'Affaire du Passeur";
			} elseif ($_SESSION["scenario"] == 'bouchon-liege') {
				$titreScenario = "L'Affaire du Bouchon de Liège";
			} elseif ($_SESSION["scenario"] == 'croque-mort') {
				$titreScenario = "L'Affaire de la Croque Mort";
			}

			$partiesJeu = simplexml_load_file($_SESSION["scenario"] . '.xml');

			if ($partiesJeu != "") {
				foreach ($partiesJeu as $partie) {
					if ($partie['nom'] == $_GET['nomPartie']) {
						$bgBanner = "./img/" . $_SESSION["scenario"] . "/bg.jpg";
						break;
					} else {
						$bgBanner = "./img/bg.jpg";
					}
				} 
			} else {
				$bgBanner = "./img/bg.jpg";
			}
			
		?>
		<section>
			<header style="background-image: url('<?php echo $bgBanner; ?>');">
				<div class="banner">
					<h1>Intime Conviction</h1>
					<p>Jurés, prendez-vous la bonne décision&nbsp;?</p>
					<div class="actions">
						<a href="#" class="button open-modal" data-modal="creer-partie">Créer une partie</a>
						<a href="#" class="button open-modal" data-modal="rejoindre-partie">Rejoindre une partie</a>
					</div>
				</div>
			</header>
			<div class="body">
				