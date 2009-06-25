<?php
	echo $rentform->create('Zufriedenheitstyp','edit');
    echo $rentform->textInput('beschreibung');
    echo $rentform->hidden('id');
    echo $rentform->select('istAblehnungsgrund', $Auswahlliste);
 	echo $rentform->end('Speichern');
?>
