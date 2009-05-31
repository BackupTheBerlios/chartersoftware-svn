<?php
	echo $rentform->create('Flugzeug','add');
    echo $rentform->textInput('Flugzeug.kennzeichen');
    echo $rentform->select('Flugzeug.flugzeugtyp_id',$typenliste);
    echo $rentform->end('Speichern');
?>
