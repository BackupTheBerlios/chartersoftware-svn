<h2>Flugzeugtyp</h2>

<?php 
	echo $html->link('Neuen Flugplatz anlegen','/flugplatzs/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Kürzel', 'Name', 'Position', 'Zeitzone','Ändern','Löschen'));

	foreach ($flugplatzs as $zeile):
	    echo $html->tableCells( array(
			$zeile['Flugplatz']['id'],
			$html->link($zeile['Flugplatz']['iata'], "/flugplatzs/view/".$zeile['Flugplatz']['id']),
        	$html->link($zeile['Flugplatz']['name'], "/flugplatzs/view/".$zeile['Flugplatz']['id']),
			$zeile['Flugplatz']['geoPosition'],
			$html->link($zeile['Zeitzone']['name'], "/zeitzones/view/".$zeile['Zeitzone']['id']),
			$html->link('Ändern', "/flugplatzs/edit/{$zeile['Flugplatz']['id']}"),
			$html->link('Löschen', "/flugplatzs/delete/{$zeile['Flugplatz']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table'); 
?>