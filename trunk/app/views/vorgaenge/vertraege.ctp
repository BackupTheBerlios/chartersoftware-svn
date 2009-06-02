<?php

	echo $html->link('Neuen Vertrag anlegen','/vorgaenge/vertragadd', array('class'=>'button1', 'style'=>'width:150px;'));
    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Nr', 'Firma', 'Datum', 'Betrag', 'Drucken','Ändern','Löschen'));

	foreach ($this->data as $zeile):
		if ($zeile['Vorgang']['vorgangstyp_id'] == 2){ //Nur Verträge!
			$firma = $zeile['Adresse']['firma'];
			$abteilung = $zeile['Adresse']['abteilung'];
			$person = $zeile['Adresse']['ansprechpartner'];
			$adresse = "$firma";
			//$adresse = "$firma ($person)";
			 
	    	echo $html->tableCells( array(
				//$zeile['Vorgangstyp']['beschreibung'].'-'. $zeile['Vorgang']['id'],
				'VER-'.$zeile['Vorgang']['id'],
				$adresse,
				$zeile['Vorgang']['datum'],
				$zeile['Vorgang']['brutto_soll'],
				$html->link('Drucken', "/vorgaenge/drucken/{$zeile['Vorgang']['id']}"),
				//$html->link('Ändern', "/vorgaenge/edit/{$zeile['Vorgang']['id']}"),
				$html->link('Löschen', "/vorgaenge/delete/{$zeile['Vorgang']['id']}", null, 'Sind Sie sich sicher?' ),
    		));
		}
    endforeach;

    echo $html->tag('/table');
?>
