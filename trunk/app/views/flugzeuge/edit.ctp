<?php
	echo $rentform->create('Flugzeug','edit');
    echo $rentform->hidden('Flugzeug.id');
    echo $rentform->textInput('Flugzeug.kennzeichen');
    echo $rentform->select('Flugzeug.flugzeugtyp_id',$typenliste);
    echo $rentform->end('Speichern');
?>
