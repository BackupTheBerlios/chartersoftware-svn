<?php
	echo $rentform->create('Flugzeughersteller','add');
    echo $rentform->textInput('name');
    echo $rentform->textInput('link', 'URL');
    echo $rentform->textInput('information', 'Informationen');
 	echo $rentform->end('Speichern');
?>
