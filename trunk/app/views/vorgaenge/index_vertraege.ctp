<?php

	echo $html->link('Neuen Vertrag anlegen','/vorgaenge/addVertrag', array('class'=>'button1', 'style'=>'width:150px;'));

    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Nr', 'Vom', 'Firma', 'Reiseziel', 'Betrag',  'Drucken'));

	foreach ($this->data as $zeile):
		$firma = $zeile['Adresse']['firma'];
		$abteilung = $zeile['Adresse']['abteilung'];
		$person = $zeile['Adresse']['ansprechpartner'];
		$adresse = "$firma";
		$ablage = "";			 

		$betrag = "";
		if ($zeile['Vorgang']['zeitcharter']==1){
			$betrag = "Nach Zeit";
		} else {
			$betrag = number_format($zeile['Vorgang']['brutto_soll'], 2, ',', '.');
		}

    	echo $html->tableCells( array(
			'VER-'. $zeile['Vorgang']['id'],
			$zeile['Vorgang']['datum'],
			$adresse,
			$zeile['Vorgang']['Flugstrecke']['zielflugplatz']['Flugplatz']['name'],
			$betrag,
			$html->link('Drucken', "/vorgaenge/vertrag/{$zeile['Vorgang']['id']}.pdf"),
			$ablage
   		));
    endforeach;

    echo $html->tag('/table');
?>
