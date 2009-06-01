<?php
	echo $html->link('Neues Flugzeug anlegen','/flugzeuge/add', array('class'=>'button1', 'style'=>'width:150px;'));
    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Kennzeichen','Typ', 'Ändern','Löschen'));

	foreach ($this->data as $zeile):
	    echo $html->tableCells( array(
			$html->link($zeile['Flugzeug']['kennzeichen'], "/flugzeuge/view/".$zeile['Flugzeug']['id']),
			$html->link($zeile['Flugzeugtyp']['name'], "/flugzeugtypen/view/".$zeile['Flugzeugtyp']['id']),
			$html->link('Ändern', "/flugzeuge/edit/{$zeile['Flugzeug']['id']}"),
			$html->link('Löschen', "/flugzeuge/delete/{$zeile['Flugzeug']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table');
?>
