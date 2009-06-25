<?php
    echo $rentform->create('Report', 'edit');

	echo $rentform->textInput('name');
	echo $rentform->hidden('id');
    echo $form->input('befehl', array('type'=>'images','div'=>'type-text'));

	//Form Abschluss mit Speicher-Button
	echo $rentform->end('Speichern');
?>
