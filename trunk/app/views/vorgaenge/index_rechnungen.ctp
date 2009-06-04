<?php

	echo $html->link('Neue Rechnung anlegen','/vorgaenge/addRechnung', array('class'=>'button1', 'style'=>'width:150px;'));

    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Nr', 'Vom', 'Firma', 'Reiseziel', 'Betrag', 'Bezahlt', 'Drucken', 'Bezahlung', 'Ablage'));

	foreach ($this->data as $zeile):
		$firma = $zeile['Adresse']['firma'];
		$abteilung = $zeile['Adresse']['abteilung'];
		$person = $zeile['Adresse']['ansprechpartner'];
		$adresse = "$firma";
		$ablage = "";			 

		if (empty($zeile['Vorgang']['zufriedenheitstyp_id'])){
			$ablage = $html->link('Ablegen', "/vorgaenge/ablegenRechnung/{$zeile['Vorgang']['id']}", null, 'Sind Sie sich sicher?' );
    	} else {
			$ablage = $zeile['Zufriedenheitstyp']['beschreibung'];
    	}


    	echo $html->tableCells( array(
			'RE-'. $zeile['Vorgang']['id'],
			$zeile['Vorgang']['datum'],
			$adresse,
			$zeile['Vorgang']['Flugstrecke']['zielflugplatz']['Flugplatz']['name'],
			$zeile['Vorgang']['brutto_soll'],
			$zeile['Vorgang']['brutto_ist'],
			$html->link('Drucken', "/vorgaenge/rechnung/{$zeile['Vorgang']['id']}.xml"),
			$html->link('Zahlung', "/vorgaenge/bezahlen/{$zeile['Vorgang']['id']}"),
			$ablage
   		));
    endforeach;

    echo $html->tag('/table');
    

	//Schalter um zwischen allen und nur aktuellen Rechnungen umschalten zu können
    if ($zeigtAlle == 'ja'){
		echo $html->link('Nur aktuelle Rechnungen anzeigen','/vorgaenge/indexRechnungen', array('class'=>'button1', 'style'=>'width:150px;'));
    } else {
		echo $html->link('Alle Rechnungen anzeigen','/vorgaenge/indexRechnungen/1', array('class'=>'button1', 'style'=>'width:150px;'));
    }
    
?>
