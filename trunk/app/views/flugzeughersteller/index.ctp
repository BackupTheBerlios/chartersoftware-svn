<?php
	echo $html->link('Neuen Hersteller anlegen','/flugzeughersteller/add', array('class'=>'button1', 'style'=>'width:150px;'));
	echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Name', 'Ändern','Löschen'));

    foreach ($this->data as $zeile):
	    echo $html->tableCells( array(
			//$zeile['Flugzeughersteller']['id'],
			$html->link($zeile['Flugzeughersteller']['name'], "/flugzeughersteller/view/".$zeile['Flugzeughersteller']['id']),
			$html->link('Ändern', "/flugzeughersteller/edit/{$zeile['Flugzeughersteller']['id']}"),
			$html->link('Löschen', "/flugzeughersteller/delete/{$zeile['Flugzeughersteller']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	endforeach;

    echo $html->tag('/table');
?>
