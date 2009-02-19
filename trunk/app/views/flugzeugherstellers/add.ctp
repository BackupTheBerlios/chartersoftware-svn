<h1>Flugzeug Hersteller hinzufuegen</h1>
<?php
	echo $form->create('Flugzeughersteller');
	
    echo $form->input('name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));

	echo $form->submit('Speichern');
 	echo $form->end();
?>