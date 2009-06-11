<?php

	//var_dump($this->data['Vorgang']['Flugstrecke']);
	echo $rentform->create('Vorgang', 'reisezeitSpeichern');
	echo $rentform->hidden('Vorgang.id');

	//================================================
	echo $rentform->begFieldset('Vorgang');
	echo $rentform->disabledTextInput('Vorgangstyp.beschreibung','Vorgangstyp');
	echo $rentform->disabledTextInput('id','Vorgangsnummer');
	echo $rentform->endFieldset();

	//================================================
	echo $rentform->begFieldset('Kundendaten');
	echo $rentform->disabledTextInput('Adresse.firma','Firma');
	echo $rentform->disabledTextInput('Adresse.abteilung','abteilung');
	echo $rentform->disabledTextInput('Adresse.ansprechpartner');
	echo $rentform->endFieldset();

	//================================================
	echo $rentform->begFieldset('Tatsächliche Reisezeit');
	echo $rentform->textInput('reisezeit');
	echo $rentform->endFieldset();


	
	//Formular abschließen
	echo $rentform->end('Speichern');
?>
