<form action="action-voter.php" method="post" class="bigger">
	<div class="radio justify-center">
		<div>
			<input type="radio" id="coupable" name="vote" value="coupable" required <?php if ($_GET['vote'] == "coupable"):?>checked<?php endif; ?> />
			<label for="coupable">Coupable</label>	
		</div>
		<div>
			<input type="radio" id="non-coupable" name="vote" value="non-coupable" required <?php if ($_GET['vote'] == "non-coupable"):?>checked<?php endif; ?> />
			<label for="non-coupable">Non coupable</label>
		</div>
	</div>
	<button type="submit">Valider</button>
</form>
