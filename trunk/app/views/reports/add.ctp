<?php
    echo $rentform->create('Report', 'add');

	echo $rentform->textInput('name');
    echo $form->input('befehl', array('type'=>'images','div'=>'type-text'));

	//Form Abschluss mit Speicher-Button
	echo $rentform->end('Speichern');
?>
