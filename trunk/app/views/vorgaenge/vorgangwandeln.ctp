<?php

	echo $rentform->create('Vorgang', 'vorgangwandeln/'.$vorgangstyp);
	$pre = "";
	
	//Überschrift erstellen
	switch($vorgangstyp){
		case 2: echo $rentform->label('','Wählen Sie ein Angebot, um daraus einen Vertrag zu erstellen');
				$pre = "ANG-";
				break;
		case 3: echo $rentform->label('','Wählen Sie ein Angebot, um daraus einen Vertrag zu erstellen');
				$pre = "VER-";
				break;
	}
	
	//Liste aller relevanten Vorgänge aufbauen
	$liste = array();
	foreach($this->data as $vorgang):
		if ($vorgang['Vorgang']['vorgangstyp_id'] == ($vorgangstyp-1)){
			$id = $vorgang['Vorgang']['id'];
			$value = $pre.$id.' vom '. $vorgang['Vorgang']['datum'];
			$liste[$id]=$value;
		}
	endforeach;

	//Liste anzeigen
	switch($vorgangstyp){
		case 2: echo $rentform->select('RECORD',$liste, 'Angebot'); break;
		case 3: echo $rentform->select('RECORD',$liste, 'Vertrag'); break;
	}
	
	//Formular abschließen
	echo $rentform->end('Erstellen');
?>
