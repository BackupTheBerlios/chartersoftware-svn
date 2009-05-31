<?php
    echo $rentform->create('Mehrwertsteuersatz', 'add');

	echo $rentform->hidden('Mehrwertsteuersatz.id');
    echo $form->inputs(array('legend'=>'Beschreibung','beschreibung'));
    echo $form->inputs(array('legend'=>'Daten','satz','scale'));

	//Form Abschluss mit Speicher-Button
    echo $form->end('Speichern');
?>
