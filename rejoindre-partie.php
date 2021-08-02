<div class="modal" id="rejoindre-partie">
    <div class="overlay"></div>
    <div class="content">
    	<h1>Rejoindre une partie</h1>
        <form action="action-rejoindre-partie.php" method="post">
			<p class="smaller"><span class="mandatory">*</span> Obligatoire</p>
			<div>
				<label for="scenario">Scénario</label>
				<select name="scenario" id="scenario">
		        	<option value="poissons-chine">L'Affaire des Poissons de Chine</option>
				    <option value="passeur">L'Affaire du Passeur</option>						    
				    <option value="bouchon-liege">L'Affaire du Bouchon de Liège</option>
				    <option value="croque-mort">L'Affaire de la Croque Mort</option>
				</select>
			</div>
			<div class="flex">
				<div>
			        <label for="code-liste">Code de la partie <span class="mandatory">*</span></label>
			        <input type="text" id="code-liste" name="code-liste" required />
			    </div>
			    <div>
			        <label for="nom-joueur">Nom du joueur <span class="mandatory">*</span></label>
			        <input type="text" id="nom-joueur" name="nom-joueur" required />
			    </div>
			</div>
		    <button type="submit">Valider</button>
		</form>
   	</div>
</div>