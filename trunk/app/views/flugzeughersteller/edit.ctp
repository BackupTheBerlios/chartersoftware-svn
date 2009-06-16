<?php
	echo $rentform->create('Flugzeughersteller','edit');
    echo $rentform->hidden('Flugzeughersteller.id');
    echo $rentform->textInput('name');
    echo $rentform->textInput('link', 'URL');
    echo $form->input('information',array('type'=>'image','div'=>'type-text'));
 	echo $rentform->end('Speichern');
?>
