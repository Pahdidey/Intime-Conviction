<?php include('header.php'); ?>


<h2><?php echo $titreScenario; ?>&nbsp;- Vote final</h2>		    			
<p>Il est temps de voter&nbsp;! Le suspect est-il <strong>coupable</strong> ou <strong>non-coupable</strong>&nbsp;? <br>
La décision obtenue résulte de la majorité simple (moitié des jurés&nbsp;+ 1).</p>

<div id="vote" class="bloc">
	<?php include('formulaire-vote.php'); ?>
</div>

<div class="bloc-actions">
    <a href="index.php?nomJoueur=<?php echo $_GET['nomJoueur']; ?>&nomPartie=<?php echo $_GET['nomPartie']; ?>" class="button arrow_back C1">Retourner à l'accueil</a>
</div>


<?php include('footer.php'); ?>