<?php
	echo $html->link('Neuen Report anlegen','/reports/add');
    echo $html->tag('table');
    echo $html->tableHeaders(array('Report-Name','Ändern','Löschen'));

    var_dump($this->data);

	foreach ($this->data as $zeile):
	    echo $html->tableCells( array(
			$zeile['Report']['name'],
			$html->link('Ändern', "/reports/edit/{$zeile['Report']['id']}"),
			$html->link('Löschen', "/reports/delete/{$zeile['Report']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table');
?>
