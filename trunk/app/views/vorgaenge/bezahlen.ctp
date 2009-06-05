<?php

	//var_dump($this->data['Vorgang']['Flugstrecke']);
	echo $rentform->create('Vorgang', 'bezahlen');
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
	//echo $rentform->begFieldset('Flugdaten');
	//echo $rentform->disabledTextInput('Flugstrecke.landungen','Von');
	//echo $rentform->endFieldset();

	//================================================
	echo $rentform->begFieldset('Geldbetrag');
	echo $rentform->disabledTextInput('Vorgang.brutto_soll');
	echo $rentform->textInput('brutto_ist');
	echo $rentform->endFieldset();


	
	//Formular abschließen
	echo $rentform->end('Speichern');
?>
