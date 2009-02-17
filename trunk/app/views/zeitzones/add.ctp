<h1>Zeitzone hinzufuegen</h1>
<?php
	echo $form->create('Zeitzone');
	
    echo $form->input('name', array('error'=>array('required'=>'Bitte den Namen einer Zeitzone eingeben','length'=>'Das Feld darf nicht laenger als 29 Zeichen sein')));
	echo $form->input('differenzUtc');
	
	echo $form->submit('Speichern');
 	echo $form->end();
?>