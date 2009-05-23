<form method="post" action="" class="yform columnar">
	<fieldset>
	 <div class="type-text">
		<label for="id">ID</label>
		<input type="text" name="id" id="id" size="20" class="readonly" readonly value=<?php echo $Adresse['Adresse']['id']?> />
	</div>
	<div class="type-text">
		<label for="firma">Firma</label>

		<input type="text" name="firma" id="firma" size="20" class="readonly" readonly value="<?php echo $Adresse['Adresse']['firma']?>" />
	</div>	
	<div class="type-text">
		<label for="abteilung">Abteilung</label>
		<input type="text" name="abteilung" id="abteilung" size="20" class="readonly" readonly value="<?php echo $Adresse['Adresse']['abteilung']?>" />
	</div>
	<div class="type-text">
		<label for="ansprechpartner">Ansprechpartner</label>

		<input type="text" name="Ansprechpartner" id="Ansprechpartner" size="20" class="readonly" readonly value="<?php echo $Adresse['Adresse']['ansprechpartner']?>" />
	</div>
	<div class="type-text">
		<label for="str">Straße</label>
		<input type="text" name="str" id="str" size="20" class="readonly" readonly value="<?php echo $Adresse['Adresse']['strasse']?>" />
	</div>
	<div class="type-text">
		<label for="plz">PLZ</label>

		<input type="text" name="plz" id="plz" size="20" class="readonly" readonly value="<?php echo $Adresse['Adresse']['plz']?>" />
	</div>
	<div class="type-text">
		<label for="ort">Ort</label>
		<input type="text" name="ort" id="ort" size="20" class="readonly" readonly value="<?php echo $Adresse['Adresse']['ort']?>" />
	</div>				
	</fieldset>
</form>
</div>