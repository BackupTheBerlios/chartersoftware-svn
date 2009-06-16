<?php
	echo $rentform->create('Flugzeughersteller','add');
    echo $rentform->textInput('name');
    echo $rentform->textInput('link', 'URL');
    echo $form->input('information',array('type'=>'image','div'=>'type-text'));
 	echo $rentform->end('Speichern');
?>
