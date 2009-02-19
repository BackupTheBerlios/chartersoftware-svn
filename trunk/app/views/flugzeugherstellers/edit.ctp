<h1>Flugzeug Hersteller aendern</h1>
<?php
	echo $form->create('Flugzeughersteller', array('action' => 'edit'));
	
    echo $form->input('name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));

	echo $form->submit('Speichern');
 	echo $form->end();
?>