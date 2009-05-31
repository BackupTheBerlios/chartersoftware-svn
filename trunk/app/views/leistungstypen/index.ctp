<?php
	echo $html->link('Neuen Leistungstypen anlegen','/leistungstypen/add');
    echo $html->tag('table');
    echo $html->tableHeaders(array('Beschreibung', 'Ändern','Löschen'));

	foreach ($this->data as $zeile):
	    echo $html->tableCells( array(
			$zeile['Leistungstyp']['beschreibung'],
			$html->link('Ändern', "/leistungstypen/edit/{$zeile['Leistungstyp']['id']}"),
			$html->link('Löschen', "/leistungstypen/delete/{$zeile['Leistungstyp']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table');
?>
