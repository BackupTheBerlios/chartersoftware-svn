<h1>Flugzeugtyp aendern</h1>
<?php
	echo $form->create('Flugzeugtyp', array('action' => 'edit'));
	
    echo $form->input('name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('flugzeughersteller_id');
    echo $form->input('reichweite');
    echo $form->input('vmax');

	echo $form->submit('Speichern');
 	echo $form->end();
?>