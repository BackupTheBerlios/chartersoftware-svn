<?php 
	echo $html->link('Neues Satz anlegen','/mehrwertsteuersaetze/add', array('class'=>'button1', 'style'=>'width:150px;'));
    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Beschreibung', 'Satz', 'Skalierung', 'Ändern','Löschen'));

    foreach ($this->data as $zeile):
	    echo $html->tableCells( array(
			$html->link($zeile['Mehrwertsteuersatz']['beschreibung'], "/mehrwertsteuersaetze/view/".$zeile['Mehrwertsteuersatz']['id']),
			$zeile['Mehrwertsteuersatz']['satz'],
			$zeile['Mehrwertsteuersatz']['scale'],
        	$html->link('Ändern', "/mehrwertsteuersaetze/edit/{$zeile['Mehrwertsteuersatz']['id']}"),
			$html->link('Löschen', "/mehrwertsteuersaetze/delete/{$zeile['Mehrwertsteuersatz']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	endforeach; 

    echo $html->tag('/table'); 
?>
