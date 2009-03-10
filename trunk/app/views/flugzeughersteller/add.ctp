<h2>Flugzeug Hersteller hinzufuegen</h2>
<?php
	echo $form->create('Flugzeughersteller');
	
    echo $form->input('name', array('label'=>'Name', 'error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('link', array('label'=>'URL'));
    echo $form->input('information', array('label'=>'Informationen'));

 	echo $form->end('Speichern');
?>