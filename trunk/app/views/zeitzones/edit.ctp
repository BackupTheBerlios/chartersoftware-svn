<h2>Aendern einer Zeitzone</h2>
<?php
	echo $form->create('Zeitzone', array('action' => 'edit'));
	
    echo $form->input('id', array('type'=>'hidden')); 
	echo $form->input('name', array('error'=>array('required'=>'Bitte den Namen einer Zeitzone eingeben','length'=>'Das Feld darf nicht laenger als 29 Zeichen sein')));
    echo $form->input('differenzUtc', array('error'=>array('required'=>'Bitte Differenz zur lokalen Zeit eingeben','length'=>'Das Feld darf nicht laenger als 3 Zeichen sein')));
    echo $form->input('sommerzeitRegel');
	
	echo $form->end('Speichern der Aenderungen');
?>