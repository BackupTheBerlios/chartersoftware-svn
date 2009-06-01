<?php
	echo $html->link('Neuen Zufriedenheitstypen anlegen','/zufriedenheitstypen/add', array('class'=>'button1', 'style'=>'width:180px;'));
    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Beschreibung','Ablehnungsgrund', 'Ändern','Löschen'));

	foreach ($this->data as $zeile):
		$istAblehnungsgrund='Ja';
		if ($zeile['Zufriedenheitstyp']['istAblehnungsgrund']==1) {$istAblehnungsgrund='Ja';}else{$istAblehnungsgrund='Nein';}
	
	    echo $html->tableCells( array(
			$zeile['Zufriedenheitstyp']['beschreibung'],
			$istAblehnungsgrund,
			$html->link('Ändern', "/zufriedenheitstypen/edit/{$zeile['Zufriedenheitstyp']['id']}"),
			$html->link('Löschen', "/zufriedenheitstypen/delete/{$zeile['Zufriedenheitstyp']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table');
?>
