<div class="modal" id="creer-partie">
    <div class="overlay"></div>
    <div class="content">
    	<h1>Créer une partie</h1>
        <form action="action-creer-partie.php" method="post">
			<div>
				<label for="scenario">Scénario</label>
				<select name="scenario" id="scenario">
		        	<option value="poissons-chine">L'Affaire des Poissons de Chine</option>
				    <option value="passeur">L'Affaire du Passeur</option>						    
				    <option value="bouchon-liege">L'Affaire du Bouchon de Liège</option>
				    <option value="croque-mort">L'Affaire de la Croque Mort</option>
				</select>
			</div>
			<div class="field-wrapper">
			    <button class="C1 add add-field">Ajouter un joueur</button>
			    <p class="smaller">Le premier joueur de la liste aura accès à des options pour ajouter/supprimer des joueurs une fois la partie lancée.</p>
			    <div>
			    	<input type="text" name="joueur[]" required />
			    </div>
			</div>
		    <button type="submit">Valider</button>
		</form>
   	</div>
</div>