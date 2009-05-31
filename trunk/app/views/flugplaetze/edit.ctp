<?php
	echo $rentform->create('Flugplatz','edit');
    echo $rentform->hidden('Flugplatz.id');
    echo $rentform->textInput('Flugplatz.name');
    echo $rentform->textInput('Flugplatz.iata');
    echo $rentform->textInput('Flugplatz.geoPosition');
    echo $rentform->select('Flugplatz.zeitzone_id',$zeitzonenliste);
    echo $rentform->end('Speichern');
?>
