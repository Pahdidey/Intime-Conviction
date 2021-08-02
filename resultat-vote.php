<?php include('header.php'); ?>


<h2><?php echo $titreScenario; ?>&nbsp;- Vote final</h2>		    			
<p>Les jurés sont en train de voter...<br>
L'accusé sera-il reconnu <strong>coupable</strong> ou <strong>non-coupable</strong>&nbsp;?</p>

<div class="bloc" id="vote">
	<p>Vous avez voté <strong class="colorC1"><?php echo $_GET['vote'];?></strong>.</p>
	<ul class="styled" id="resultat-vote">
		<?php 
			$x = 0;
			$y = 0; 
		?>
		<?php foreach ($partie->joueur as $joueur): ?>
			<?php if ($joueur['vote'] != '0'): ?>
				<li><?php echo $joueur['nom']; ?>&nbsp;- <span class="material-icons">task_alt</span></li>
				<?php $x++; ?>
			<?php else: ?>
				<li><?php echo $joueur['nom']; ?></li>
			<?php endif; ?>
			<?php $y++; ?>
		<?php endforeach; ?>
	</ul>

	<?php foreach ($partie->joueur as $joueur): ?>	
			<?php if (($joueur['id'] == $_GET['nomJoueur']) && ($joueur['orga'] == 1)): ?>
				<div id="resultat-final">
					<?php if ($x == $y): ?>
						<div class="bloc-actions">
					        <a href="action-resultat-final.php?nomJoueur=<?php echo $_GET['nomJoueur']; ?>&nomPartie=<?php echo $_GET['nomPartie']; ?>#vote" class="button check C1">Voir le résultat final</a>
					    </div>
				    <?php endif; ?>
				</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>

<div class="bloc">
	<h3>Changer mon vote</h3>
	<?php include('formulaire-vote.php'); ?>
</div>

<div class="bloc-actions">
    <a href="index.php?nomJoueur=<?php echo $_GET['nomJoueur']; ?>&nomPartie=<?php echo $_GET['nomPartie']; ?>" class="button arrow_back C1">Retourner à l'accueil</a>
</div>



<script type="text/javascript">
	// Recharge auto votes

    setInterval(function(){
       $("#vote #resultat-vote").load("#vote #resultat-vote > li");
    }, 5000);


    // Recharge auto votes

    setInterval(function(){
       $("#vote #resultat-final").load("#vote #resultat-final > div");
    }, 5000);


	// Recharge auto de la fin de la partie

    function rechargeautofinpartie(){
        setTimeout( function(){
            $.ajax({
                url : "refresh-finpartie.php",
                type : 'GET',
                success : affichrechargefinpartie
            });
            rechargeautofinpartie();
        }, 3000);
    }

    function affichrechargefinpartie(reponse) { 
        if (reponse == "fini") {
        	window.location.replace("resultat-final.php#vote");
        }
    }

    rechargeautofinpartie();
</script>


<?php include('footer.php'); ?>