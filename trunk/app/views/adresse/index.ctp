<?php
	echo $html->link('Neue Adresse anlegen','/adressen/add');
    echo $html->tag('table');
    echo $html->tableHeaders(array('Firma', 'Name', 'Straße','PLZ','Ort','Ändern','Löschen'));

	foreach ($this->data as $zeile):
	    echo $html->tableCells( array(
			$zeile['Adresse']['firma'],
			//$zeile['Adresse']['abteilung'],
			$zeile['Adresse']['ansprechpartner'],
			$zeile['Adresse']['strasse'],
			$zeile['Adresse']['plz'],
			$zeile['Adresse']['ort'],
//			$html->link('Details', "/adressen/view/{$zeile['Adresse']['id']}"),
			$html->link('Ändern', "/adressen/edit/{$zeile['Adresse']['id']}"),
			$html->link('Löschen', "/adressen/delete/{$zeile['Adresse']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table');
?>
