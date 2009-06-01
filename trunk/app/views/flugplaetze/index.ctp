<?php
	echo $html->link('Neuen Flugplatz anlegen','/flugplaetze/add', array('class'=>'button1', 'style'=>'width:150px;'));
    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Kürzel', 'Name', 'Position', 'Zeitzone','Ändern','Löschen'));

    //var_dump($zeitzonen);

	foreach ($this->data as $zeile):
	    echo $html->tableCells( array(
			$html->link($zeile['Flugplatz']['iata'], "/flugplaetze/view/".$zeile['Flugplatz']['id']),
        	$html->link($zeile['Flugplatz']['name'], "/flugplaetze/view/".$zeile['Flugplatz']['id']),
			$zeile['Flugplatz']['geoPosition'],
            $zeitzonenname =$zeitzonenliste[$zeile['Flugplatz']['zeitzone_id']],
			$html->link('Ändern', "/flugplaetze/edit/{$zeile['Flugplatz']['id']}"),
			$html->link('Löschen', "/flugplaetze/delete/{$zeile['Flugplatz']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table');
?>
