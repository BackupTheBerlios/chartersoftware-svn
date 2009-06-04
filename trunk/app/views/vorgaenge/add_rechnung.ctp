<?php

	echo $rentform->create('Vorgang', 'addRechnung');
	echo $rentform->label('','Wählen Sie einen Vertrag, um daraus eine Rechnung zu erstellen');
	
	//Liste anzeigen
	echo $rentform->select('RECORD',$vertragsliste, 'Vertrag'); 
	
	//Formular abschließen
	echo $rentform->end('Erstellen');
?>
