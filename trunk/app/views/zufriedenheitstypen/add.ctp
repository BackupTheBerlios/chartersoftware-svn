<?php
	echo $rentform->create('Zufriedenheitstyp','add');
    echo $rentform->textInput('beschreibung');
    echo $rentform->select('istAblehnungsgrund', $Auswahlliste);
 	echo $rentform->end('Speichern');
?>
