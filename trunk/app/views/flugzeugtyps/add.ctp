<h1>Flugzeugtyp zufuegen</h1>
<?php
	echo $form->create('FlugzeugTyp');
	
    echo $form->input('name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('flugzeughersteller_id');

	echo $form->submit('Speichern');
 	echo $form->end();
?>