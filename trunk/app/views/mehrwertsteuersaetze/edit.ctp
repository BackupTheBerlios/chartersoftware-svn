<?php
    echo $rentform->create('Mehrwertsteuersatz', 'edit');

	echo $rentform->hidden('id');
	echo $rentform->textInput('beschreibung');
	echo $rentform->textInput('satz');
	echo $rentform->textInput('scale');

	//Form Abschluss mit Speicher-Button
    echo $form->end('Speichern');
?>
