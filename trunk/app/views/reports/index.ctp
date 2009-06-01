<?php
	echo $html->link('Neuen Report anlegen','/reports/add', array('class'=>'button1', 'style'=>'width:150px;'));
    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Report-Name','Ändern','Löschen'));

	foreach ($this->data as $zeile):
	    echo $html->tableCells( array(
			$zeile['Report']['name'],
			$html->link('Ändern', "/reports/edit/{$zeile['Report']['id']}"),
			$html->link('Löschen', "/reports/delete/{$zeile['Report']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table');
?>
