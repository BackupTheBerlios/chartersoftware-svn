<?php 

	//HTML-Formular öffnen
	echo $rentform->create('Vorgang', 'edit');
	echo $rentform->hidden('id');

	//================================================
	echo $rentform->begFieldset('Kundendaten');
	echo $rentform->select('adresse_id',$adressenliste, 'Kunde<sup title="Pflichtfeld.">*</sup>');
	echo $rentform->disabledTextInput('abteilung');
	echo $rentform->disabledTextInput('ansprechpartner');
	echo $rentform->disabledTextInput('strasse');
	echo $rentform->disabledTextInput('plz','PLZ');
	echo $rentform->disabledTextInput('ort');
	echo $rentform->endFieldset();
	

	//================================================
	echo $rentform->begFieldset('Flugdaten');
	echo $rentform->hidden('Vorgang.flugstrecke');
	
	echo $rentform->select('zeitcharter', $zeitcharter);
	echo $rentform->textInput('vonDatum', 'Von Datum');
	echo $rentform->textInput('bisDatum', 'Bis Datum');
	echo $rentform->select('startflughafen', $flugplatzliste);	
	echo $rentform->select('zielflughafen', $flugplatzliste);
	echo '<div id="DivZwischenstop">' . "\n";
	echo $rentform->select('Zwischenstop', $flugplatzliste);
	echo $rentform->button('Hinzufügen', array('id'=>'button_zwischenstop', 'name'=>"button_zwischenstop", 'style'=>"float:right"));	
	echo '</div>' . "\n";
	echo $rentform->textInput('AnzahlPersonen', 'Anzahl Personen');
	
	echo $rentform->select('flugzeugtyp_id', $flugzeugtypenListeKomplett);
	echo $rentform->textInput('AnzahlFlugbegleiter', 'Weitere Flugbegleiter');
	echo $rentform->endFieldset();



	//================================================
	echo $rentform->begFieldset('Sonderwünsche');
	echo $rentform->textInput('sonderwunsch');
	echo $rentform->textInput('sonderwunsch_netto');
	//echo $rentform->button('Hinzufügen', array('id'=>'button_sonderwunsch', 'name'=>"button_sonderwunsch", 'style'=>"float:right"));	
	echo $rentform->endFieldset();
		
	//================================================
	//HTML-Formular schließen
	echo $rentform->end('Angebot Speichern');
	
?>
