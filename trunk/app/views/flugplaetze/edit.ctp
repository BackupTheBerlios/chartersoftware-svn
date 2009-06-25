<?php
	echo $rentform->create('Flugplatz','edit');
    echo $rentform->hidden('id');
    echo $rentform->textInput('name');
    echo $rentform->textInput('iata');
    echo $rentform->textInput('geoPosition');
    echo $rentform->select('zeitzone_id',$zeitzonenliste);
    echo $rentform->end('Speichern');
?>
