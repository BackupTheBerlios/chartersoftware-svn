<?php
	echo $html->link('Neues Angebot anlegen','/angebote/add');
    echo $html->tag('table');
    echo $html->tableHeaders(array('Nummer', 'Firma', 'Datum', 'Betrag', 'Drucken','Ändern','Löschen'));

	foreach ($this->data as $zeile):
		if ($zeile['Vorgang']['vorgangstyp_id'] == 1){ //Nur Angebote!
			$firma = $zeile['Adresse']['firma'];
			$abteilung = $zeile['Adresse']['abteilung'];
			$person = $zeile['Adresse']['ansprechpartner'];
			$adresse = "$firma";
			//$adresse = "$firma ($person)";
			 
	    	echo $html->tableCells( array(
				//$zeile['Vorgangstyp']['beschreibung'].'-'. $zeile['Vorgang']['id'],
				$zeile['Vorgang']['id'],
				$adresse,
				$zeile['Vorgang']['datum'],
				$zeile['Vorgang']['betrag_soll'],
				$html->link('Drucken', "/vorgaenge/drucken/{$zeile['Vorgang']['id']}"),
				$html->link('Ändern', "/vorgaenge/edit/{$zeile['Vorgang']['id']}"),
				$html->link('Löschen', "/vorgaenge/delete/{$zeile['Vorgang']['id']}", null, 'Sind Sie sich sicher?' ),
    		));
		}
    endforeach;

    echo $html->tag('/table');
?>