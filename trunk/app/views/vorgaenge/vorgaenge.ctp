<?php
	$pre = "";
	$text = '';
	switch($vorgangstyp){
		case 1: echo $html->link('Neues Angebot anlegen','/vorgaenge/add/', array('class'=>'button1', 'style'=>'width:150px;'));
				$pre = 'ANG-'; 
				break;
		case 2: echo $html->link('Neuen Vertrag anlegen','/vorgaenge/vorgangwandeln/2', array('class'=>'button1', 'style'=>'width:150px;'));
				$pre = 'VER-';
				$link =''; 
				break;
		case 3: echo $html->link('Neue Rechnung anlegen','/vorgaenge/vorgangwandeln/3', array('class'=>'button1', 'style'=>'width:150px;'));
				$pre = 'RECH-'; 
				$link =''; 
				break;
	}
    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Nr', 'Firma', 'Datum', 'Betrag/Soll', 'Betrag/Ist', 'Drucken','Zahlung'));

	foreach ($this->data as $zeile):
		if ($zeile['Vorgang']['vorgangstyp_id'] == $vorgangstyp){ //Nur Rechnungen oder verträge oder angebote
			$firma = $zeile['Adresse']['firma'];
			$abteilung = $zeile['Adresse']['abteilung'];
			$person = $zeile['Adresse']['ansprechpartner'];
			$adresse = "$firma";
			//$adresse = "$firma ($person)";
			 
	    	echo $html->tableCells( array(
				//$zeile['Vorgangstyp']['beschreibung'].'-'. $zeile['Vorgang']['id'],
				$pre . $zeile['Vorgang']['id'],
				$adresse,
				$zeile['Vorgang']['datum'],
				$zeile['Vorgang']['brutto_soll'],
				$zeile['Vorgang']['brutto_ist'],
				$html->link('Drucken', "/vorgaenge/drucken/{$zeile['Vorgang']['id']}"),
				$html->link('Zahlung', "/vorgaenge/bezahlen/{$zeile['Vorgang']['id']}"),
    		));
		}
    endforeach;

    echo $html->tag('/table');
?>
