<h2>Flugplätze</h2>

<?php 
	echo $html->link('Neuen Flugplatz anlegen','/flugplaetze/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Kürzel', 'Name', 'Position', 'Zeitzone','Ändern','Löschen'));

	foreach ($flugplaetze as $zeile):
	    echo $html->tableCells( array(
			$zeile['Flugplatz']['id'],
			$html->link($zeile['Flugplatz']['iata'], "/flugplaetze/view/".$zeile['Flugplatz']['id']),
        	$html->link($zeile['Flugplatz']['name'], "/flugplaetze/view/".$zeile['Flugplatz']['id']),
			$zeile['Flugplatz']['geoPosition'],
			$html->link($zeile['Zeitzone']['name'], "/zeitzones/view/".$zeile['Zeitzone']['id']),
			$html->link('Ändern', "/flugplaetze/edit/{$zeile['Flugplatz']['id']}"),
			$html->link('Löschen', "/flugplaetze/delete/{$zeile['Flugplatz']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table'); 
?>