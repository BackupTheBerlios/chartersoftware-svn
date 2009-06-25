<?php
    echo $rentform->create('Leistungstyp', 'edit');
	echo $rentform->hidden('id');
	echo $rentform->textInput('beschreibung');
	echo $rentform->end('Speichern');
?>
