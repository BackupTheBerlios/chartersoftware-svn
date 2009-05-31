<?php
	echo $rentform->create('Flugplatz','add');
    echo $rentform->textInput('Flugplatz.name');
    echo $rentform->textInput('Flugplatz.iata');
    echo $rentform->textInput('Flugplatz.geoPosition');
    echo $rentform->select('Flugplatz.zeitzone_id',$zeitzonenliste);
    echo $rentform->end('Speichern');
?>
