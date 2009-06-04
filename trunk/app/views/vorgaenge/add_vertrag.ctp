<?php

	echo $rentform->create('Vorgang', 'addVertrag');
	echo $rentform->label('','Wählen Sie ein Angebot, um daraus einen Vertrag zu erstellen');
	
	//Liste anzeigen
	echo $rentform->select('RECORD',$angebotsliste, 'Angebot'); 
	
	//Formular abschließen
	echo $rentform->end('Erstellen');
?>
