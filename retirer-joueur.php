<div class="modal" id="retirer-joueur">
    <div class="overlay"></div>
    <div class="content">
    	<h1>Retirer un joueur</h1>
        <form action="action-retirer-joueur.php" method="post">
			<div class="radio">
				<?php foreach ($partie->joueur as $joueur): ?>
					<?php if ($joueur['orga'] == 0): ?>
						<div>
							<input type="radio" id="<?php echo $joueur['id']; ?>" name="retrait" value="<?php echo $joueur['id']; ?>" required />
							<label for="<?php echo $joueur['id']; ?>"><?php echo $joueur['nom']; ?></label>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		    <button type="submit">Valider</button>
		</form>
   	</div>
</div>