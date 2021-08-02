<?php include('header.php'); ?>


<?php $i = 0; ?>

<?php foreach ($partiesJeu as $partie): ?>

	<?php if ($partie['nom'] == $_GET['nomPartie']): ?>

		<h2><?php echo $titreScenario; ?></h2>		    			
		<p>Partagez ce code avec les autres joueurs pour qu'ils vous rejoignent&nbsp;: <strong><?php echo $partie['nom']; ?></strong></p>

		<div id="salle" class="bloc">
			<h3>La salle de délibération</h3>
			<div class="flex margin-top">
    			<div class="flex40 center-align padding-right margin-bottom">
	    			<a href="./img/<?php echo $_SESSION["scenario"]; ?>/plateau.jpg" class="open-lightbox">
						<figure>
							<img src="./img/<?php echo $_SESSION["scenario"]; ?>/plateau.jpg" alt="">
						</figure>
					</a>
					<div class="actions">
						<a href="./img/<?php echo $_SESSION["scenario"]; ?>/plateau.jpg" download="plateau.jpg" class="button fullwidth">Télécharger</a>
					</div>
				</div>
				<div class="cards flex60 center-align" id="cartes-jures">
					<?php for ($i = 1; $i <= 12; $i++): ?>
						<div>
							<figure>
								<?php foreach ($partie->joueur as $joueur): ?>
									<?php foreach ($joueur->carte as $carte): ?>
										<?php if ($carte['id'] == $i): ?>
											<?php if ($carte['etat'] == 1): ?>
												<img src="./img/<?php echo $_SESSION["scenario"]; ?>/<?php echo $carte['id']; ?>-v.jpg" alt="">
												<?php $nbCartesDevoilees++; ?>
											<?php else: ?>
												<img src="./img/<?php echo $_SESSION["scenario"]; ?>/<?php echo $carte['id']; ?>-r.jpg" alt="">
											<?php endif; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								<?php endforeach; ?>
							</figure>
						</div>
					<?php endfor; ?>
				</div>
			</div>
			<div class="bloc-actions">
                <a href="vote.php?nomJoueur=<?php echo $_GET['nomJoueur']; ?>&nomPartie=<?php echo $_GET['nomPartie']; ?>#vote" class="button gavel C1">Passer au vote final</a>
            </div>
		</div>

		

		<div id="jures" class="bloc">
			<h3>Mes cartes Juré</h3>
			<?php foreach ($partie->joueur as $joueur): ?>	
				<?php if ($joueur['id'] == $_GET['nomJoueur']): ?>
					<div class="cards">
						<?php foreach ($joueur->carte as $carte): ?>
							<div>
								<?php if ($carte['etat'] == 1): ?>
									<?php $etatCarte = "-v"; ?>
								<?php else: ?>
									<?php $etatCarte = "-r"; ?>
								<?php endif; ?>
								<a href="./img/<?php echo $_SESSION["scenario"]; ?>/<?php echo $carte['id'] . $etatCarte; ?>.jpg" class="open-lightbox">
									<figure>
										<img src="./img/<?php echo $_SESSION["scenario"]; ?>/<?php echo $carte['id'] . $etatCarte; ?>.jpg" alt="">
									</figure>
								</a>
								<?php if ($carte['etat'] == 0): ?>
								<div class="actions">
									<a href="action-retourner.php?idCarte=<?php echo $carte['id']; ?>" class="button picto" title="Retourner"><i class="material-icons">refresh</i></a>
								</div>
								<?php endif; ?>
							</div>		
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>

		<?php foreach ($partie->joueur as $joueur): ?>	
			<?php if (($joueur['id'] == $_GET['nomJoueur']) && ($joueur['orga'] == 1)): ?>
				<div id="orga" class="bloc">
					<h3>Organisation de la partie</h3>
					<ul class="styled">
						<?php foreach ($partie->joueur as $joueur): ?>
							<li><?php echo $joueur['nom']; ?></li>
						<?php endforeach; ?>
					</ul>
					<div class="bloc-actions">
						<a href="#" class="button remove open-modal" data-modal="retirer-joueur">Retirer un joueur</a>
		                <a href="#" class="button add C1 open-modal" data-modal="ajouter-joueur">Ajouter un joueur</a>
		            </div>

		            <?php include('retirer-joueur.php'); ?>
					<?php include('ajouter-joueur.php'); ?>
				</div>

			<?php endif; ?>
		<?php endforeach; ?>

		<?php $i++; ?>
		<?php break; ?>
	<?php endif; ?>

<?php endforeach; ?>


<?php if ($i == 0): ?>
	<p class="bigger"><strong>Aucune partie en cours.</strong></p> 
	<p>Créez en une nouvelle ou rejoignez une partie existante.</p>
<?php endif; ?>



<script type="text/javascript">
	// Recharge auto cartes jurés

    setInterval(function(){
       $("#salle #cartes-jures").load("#salle #cartes-jures > div");
    }, 5000);
</script>

<?php include('footer.php'); ?>