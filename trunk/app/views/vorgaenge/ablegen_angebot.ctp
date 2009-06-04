<?php 
	//HTML-Formular öffnen
	echo $rentform->create('Vorgang', 'ablegenAngebot');
	echo $rentform->hidden('id');

	//================================================
	echo $rentform->begFieldset('Kundendaten');
	echo $rentform->disabledTextInput('Adresse.firma');
	echo $rentform->disabledTextInput('Adresse.abteilung');
	echo $rentform->disabledTextInput('Adresse.ansprechpartner');
	echo $rentform->disabledTextInput('Adresse.strasse');
	echo $rentform->disabledTextInput('Adresse.plz','PLZ');
	echo $rentform->disabledTextInput('Adresse.ort');
	echo $rentform->endFieldset();
	



	//================================================
	echo $rentform->begFieldset('Ablehnungsgrund');
	echo $rentform->select('zufriedenheitstyp_id', $ablehnungsgrundliste, 'Ablehnungsgrund');
	echo $rentform->endFieldset();
		
	//================================================
	//HTML-Formular schließen
	echo $rentform->end('Angebot Ablegen');
	
?>
