<?php 
	echo $html->link('Neuen Vorgangstypen anlegen','/vorgangstypen/add', array('class'=>'button1', 'style'=>'width:150px;'));
    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Beschreibung', 'Ändern','Löschen'));

    foreach ($this->data as $zeile):
	    echo $html->tableCells( array(
			$html->link($zeile['Vorgangstyp']['beschreibung'], "/vorgangstypen/view/".$zeile['Vorgangstyp']['id']),
        	$html->link('Ändern', "/vorgangstypen/edit/{$zeile['Vorgangstyp']['id']}"),
			$html->link('Löschen', "/vorgangstypen/delete/{$zeile['Vorgangstyp']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	endforeach; 

    echo $html->tag('/table'); 
?>
