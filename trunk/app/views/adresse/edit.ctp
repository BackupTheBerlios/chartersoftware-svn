<div id="txtcontent" class="normal">
<form method="post" action="" class="yform columnar">
	<fieldset>
	 <div class="type-text">
		<label for="id">ID</label>
		<input type="text" name="id" id="id" size="20" class="readonly" readonly value=<?php echo $Adresse['Adresse']['id']?> />
	</div>
	<div class="type-text">
		<label for="firma">Firma</label>

		<input type="text" name="firma" id="firma" size="20" class="readonly" value="<?php echo $Adresse['Adresse']['firma']?>" />
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

<?php
    echo $form->create('Adresse', array('action' => 'edit'));
    echo $form->input('Adresse.id',array('type' => 'hidden'));
    echo $form->input('Adresse.firma', array('error'=>array('length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.abteilung', array('error'=>array('length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.ansprechpartner', array('error'=>array('required'=>'Bitte den Ansprechpartner eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.strasse', array('error'=>array('required'=>'Bitte die Straße des Kunden eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.plz', array('error'=>array('required'=>'Bitte die Postleitzahl eingeben','length'=>'Das Feld darf nicht laenger als 5 Zeichen sein')));
    echo $form->input('Adresse.ort', array('error'=>array('required'=>'Bitte den Ort eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->end('Speichern');
?>
</div>