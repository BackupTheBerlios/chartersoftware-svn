<h1>Flugzeugtyp zufuegen</h1>
<?php
	echo $form->create('Flugzeugtyp');
	
    echo $form->input('Flugzeugtyp.name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Flugzeugtyp.flugzeughersteller_id', array('label'=>'Reichweite'));
    echo $form->input('Flugzeugtyp.reichweite', array('label'=>'Reichweite'));
    echo $form->input('Flugzeugtyp.vmax', array('label'=>'Geschwindigkeit'));

	echo $form->submit('Speichern');
 	echo $form->end();
?>