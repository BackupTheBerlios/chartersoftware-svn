<?php 

	//HTML-Formular öffnen
	echo $rentform->create('Vorgang', 'addAngebot');

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
	echo $rentform->button('Hinzufügen', array('id'=>'button_zwischenstop', 'name'=>"button_zwischenstop", 'style'=>"width:120px; float:right"));	
	echo '</div>' . "\n";
	echo $rentform->textInput('AnzahlPersonen', 'Anzahl Personen');
	echo $rentform->button('Aktualisieren', array('id'=>'personen_update', 'name'=>"personen_update", 'style'=>"width:120px; float:right"));	
	
	echo $rentform->select('flugzeugtyp_id', $flugzeugtypenListeKomplett);
	echo $rentform->textInput('AnzahlFlugbegleiter', 'Flugbegleiter');
	echo $rentform->buttonadddel('-', array('id'=>'attendands_del', 'name'=>"attendands_del", 'style'=>"float:right; width:20px;"),'+', array('id'=>'attendands_add', 'name'=>"attendands_add", 'style'=>"float:right; width:20px; margin-right:10px;"));	
	echo $rentform->endFieldset();



	//================================================
	echo $rentform->begFieldset('Sonderwünsche');
	echo $rentform->textInput('sonderwunsch');
	echo $rentform->textInput('sonderwunsch_netto');
	echo $rentform->button('Aktualisieren', array('id'=>'button_sonderwunsch', 'name'=>"button_sonderwunsch", 'style'=>"float:right"));	
	echo $rentform->endFieldset();
		
	//================================================
	//HTML-Formular schließen
	echo $rentform->end('Angebot Speichern');
	
?>
