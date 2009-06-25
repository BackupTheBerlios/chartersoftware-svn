<?php
	echo $rentform->create('Flugzeug','add');
    echo $rentform->textInput('kennzeichen');
    echo $rentform->select('flugzeugtyp_id',$typenliste);
    echo $rentform->end('Speichern');
?>
