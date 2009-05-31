<?php
	echo $rentform->create('Vorgang','edit');

	echo $rentform->begFieldset('');
	echo $rentform->disabledTextInput('Vorgang.id', 'Vorgangsnummer');
	echo $rentform->endFieldset();
	
	
	echo $rentform->begFieldset('Kundendaten');
	echo $rentform->select('Vorgang.adresse_id',$adressenliste);
	echo $rentform->disabledTextInput('Vorgang.firma');
	echo $rentform->disabledTextInput('Vorgang.abteilung');
	echo $rentform->disabledTextInput('Vorgang.ansprechpartner');
	echo $rentform->disabledTextInput('Vorgang.strasse');
	echo $rentform->disabledTextInput('Vorgang.plz');
	echo $rentform->disabledTextInput('Vorgang.ort');
	echo $rentform->endFieldset();

	echo $rentform->begFieldset('Flugdaten');
	echo $rentform->select('Vorgang.adresse_id',$Adressen);
	echo $rentform->disabledTextInput('Vorgang.firma');
	echo $rentform->disabledTextInput('Vorgang.abteilung');
	echo $rentform->disabledTextInput('Vorgang.ansprechpartner');
	echo $rentform->disabledTextInput('Vorgang.strasse');
	echo $rentform->disabledTextInput('Vorgang.plz');
	echo $rentform->disabledTextInput('Vorgang.ort');
	echo $rentform->endFieldset();

	echo $rentform->end('Speichern');
?>
