<?php include('header.php'); ?>


<h2><?php echo $titreScenario; ?></h2>		    			
<p>Résultat des votes...</p>

<div class="bloc" id="vote">
	<h3>Verdict</h3>


	<?php
		$scenario = $_SESSION["scenario"] . ".xml";
		$code = $_SESSION["nomPartie"];

		$xml = simplexml_load_file($scenario);

		$xmlChemin = '//partie[@nom="' . $code . '"]';

		foreach ($xml->xpath($xmlChemin) as $partie) {	
			$resultatPartie = $partie['resultat'];

			$coupable = 0;
			$nonCoupable = 0;

			foreach ($partie->joueur as $joueur) {
				if ($joueur['vote'] == 'coupable') {
					$coupable++;
				} elseif ($joueur['vote'] == 'non-coupable') {
					$nonCoupable++;
				}
			}
		}

	?>

	<?php if ($resultatPartie == "egalite"): ?>
		<p>Il y a <strong class="colorC1">égalité</strong>&nbsp;! <br>
		Le verdict final ne sera valide qu'avec une majorité simple (moitié des jurés&nbsp;+ 1) minimum.</p>
	<?php else: ?>
		<p>L'accusé est reconnu... <strong class="colorC1"><?php echo $resultatPartie; ?></strong>&nbsp;!</p>
		<p>Les votes&nbsp;:</p>
		<ul>
			<li><strong>Coupable</strong>&nbsp;- <?php echo $coupable; ?></li>
			<li><strong>Non-coupable</strong>&nbsp;- <?php echo $nonCoupable; ?></li>
		</ul>
	<?php endif; ?>
</div>

<?php if ($resultatPartie == "egalite"): ?>
	<div class="bloc">
		<h3>Voter de nouveau</h3>
		<?php include('formulaire-vote.php'); ?>
	</div>
	<div class="bloc-actions">
	    <a href="index.php?nomJoueur=<?php echo $_SESSION['nomJoueur']; ?>&nomPartie=<?php echo $_SESSION['nomPartie']; ?>" class="button arrow_back C1">Retourner à l'accueil</a>
	</div>
<?php else: ?>
	<div class="bloc-actions">
	    <a href="index.php" class="button arrow_back C1">Retourner à l'accueil</a>
	</div>
<?php endif; ?>




<?php
	if ($resultatPartie == "egalite") {
		sleep(3);
		foreach ($xml->xpath($xmlChemin) as $partie) {
			$partie['resultat'] = 0;
		}
		$xml->asXML($scenario);
	}
?>


<?php include('footer.php'); ?>