<h2>Zeitzone hinzufuegen</h2>
<?php
	echo $form->create('Zeitzone');
	
    echo $form->input('name', array('error'=>array('required'=>'Bitte den Namen einer Zeitzone eingeben','length'=>'Das Feld darf nicht laenger als 29 Zeichen sein')));
    echo $form->input('differenzUtc', array('error'=>array('required'=>'Bitte Differenz zur lokalen Zeit eingeben','length'=>'Das Feld darf nicht laenger als 3 Zeichen sein')));
    echo $form->input('sommerzeitRegel');

	echo $form->submit('Speichern');
 	echo $form->end();
?>