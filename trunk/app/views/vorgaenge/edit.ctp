<?php 

	//HTML-Formular öffnen
	echo $rentform->create('Vorgang', 'edit/'.$vorgangstyp);

	//================================================
	echo $rentform->begFieldset('Kundendaten');
	echo $rentform->hidden('Vorgang.id');
	echo $rentform->select('Vorgang.adresse_id',$adressenliste, 'Kunde<sup title="Pflichtfeld.">*</sup>');
	echo $rentform->disabledTextInput('Adresse.abteilung');
	echo $rentform->disabledTextInput('ansprechpartner');
	echo $rentform->disabledTextInput('Adresse.strasse');
	echo $rentform->disabledTextInput('Adresse.plz','PLZ');
	echo $rentform->disabledTextInput('ort');
	echo $rentform->endFieldset();
	

	//================================================
	echo $rentform->begFieldset('Flugdaten');
	//echo $rentform->hidden('flugstrecke', '$flugstrecke');
	echo $rentform->hidden('Vorgang.flugstrecke');
	
	echo $rentform->select('Vorgang.zeitcharter', $zeitcharter);
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
	echo $rentform->textInput('Sonderwunsch');
	echo $rentform->textInput('Aufpreis');
	echo $rentform->button('Hinzufügen', array('id'=>'button_sonderwunsch', 'name'=>"button_sonderwunsch", 'style'=>"float:right"));	
		
	//HTML-Formular schließen
	echo $rentform->end('Speichern');
	
?>
