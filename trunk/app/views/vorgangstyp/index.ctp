<?php
	var_dump($this->data);
	echo $html->link('Neue Angebot anlegen','/vorgaenge/add');
    echo $html->tag('table');
    echo $html->tableHeaders(array('Kürzel', 'Name', 'Position', 'Zeitzone','Ändern','Löschen'));

	
	foreach ($this->data as $zeile):
		echo '2';
	    echo $html->tableCells( array(
			//$zeile['Vorgang']['id'],
			//$zeile['Vorgang']['datum'],
            //$zeitzonenliste[$zeile['Vorgang']['zeitzone_id']],
            'a','b','c','d',
			$html->link('Ändern', "/vorgaenge/edit/{$zeile['Vorgang']['id']}"),
			$html->link('Löschen', "/vorgange/delete/{$zeile['Vorgang']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table');
?>
