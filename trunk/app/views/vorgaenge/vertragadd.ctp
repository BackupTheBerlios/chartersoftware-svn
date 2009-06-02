<?php

	echo $rentform->create('Vorgang', 'vertragadd');
	echo $rentform->label('','Wählen Sie ein Angebot, um daraus einen Vertrag zu erstellen');
	$liste = array();
	foreach($this->data as $angebot):
		$id = $angebot['Vorgang']['id'];
		$value = 'ANG-'.$id.' vom '. $angebot['Vorgang']['datum'];
		$liste[$id]=$value;
	endforeach;
	echo $rentform->select('Angebot',$liste );
	echo $rentform->end('Erstellen');
?>
