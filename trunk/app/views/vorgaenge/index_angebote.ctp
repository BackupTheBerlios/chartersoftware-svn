<?php
	echo $html->link('Neues Angebot anlegen','/vorgaenge/addAngebot/', array('class'=>'button1', 'style'=>'width:150px;'));
    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Nr', 'Vom', 'Firma', 'Reiseziel','Betrag',  'Drucken','Ablage'));


	//Liste aller Angebote
	foreach ($this->data as $zeile):
		$firma = $zeile['Adresse']['firma'];
		$abteilung = $zeile['Adresse']['abteilung'];
		$person = $zeile['Adresse']['ansprechpartner'];
		$adresse = "$firma";
		$ablage = "";			 

		if (empty($zeile['Vorgang']['zufriedenheitstyp_id'])){
			$ablage = $html->link('Ablegen', "/vorgaenge/ablegenAngebot/{$zeile['Vorgang']['id']}", null, 'Sind Sie sich sicher?' );
    	} else {
			$ablage = $zeile['Zufriedenheitstyp']['beschreibung'];
    	}

    	echo $html->tableCells( array(
			'ANG-'. $zeile['Vorgang']['id'],
			$zeile['Vorgang']['datum'],
			$adresse,
			$zeile['Vorgang']['Flugstrecke']['zielflugplatz']['Flugplatz']['name'],
			$zeile['Vorgang']['brutto_soll'],
			$html->link('Drucken', "/vorgaenge/angebot/{$zeile['Vorgang']['id']}.xml"),
			$ablage
   		));
    endforeach;

    echo $html->tag('/table');

	//Schalter um zwischen allen und nur aktuellen Angeboten umschalten zu können
    if ($zeigtAlle == 'ja'){
		echo $html->link('Nur aktuelle Angebote anzeigen','/vorgaenge/indexAngebote', array('class'=>'button1', 'style'=>'width:150px;'));
    } else {
		echo $html->link('Alle Angebote anzeigen','/vorgaenge/indexAngebote/1', array('class'=>'button1', 'style'=>'width:150px;'));
    }
?>
