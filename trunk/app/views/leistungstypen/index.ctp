<?php
	echo $html->link('Neuen Leistungstypen anlegen','/leistungstypen/add', array('class'=>'button1', 'style'=>'width:150px;'));
    echo $html->tag('table', Null, array('class' => 'tbl1'));
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
