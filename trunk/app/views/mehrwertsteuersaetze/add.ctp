<?php
    echo $rentform->create('Mehrwertsteuersatz', 'add');

	echo $rentform->textInput('beschreibung');
	echo $rentform->textInput('satz');
	echo $rentform->textInput('scale');

	//Form Abschluss mit Speicher-Button
    echo $form->end('Speichern');
?>
