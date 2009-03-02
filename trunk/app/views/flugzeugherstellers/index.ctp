<h2>Flugzeug Hersteller</h2>

<?php 
	echo $html->link('Neuen Hersteller anlegen','/flugzeugherstellers/add');
	echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Name', 'Ändern','Löschen'));

    foreach ($flugzeugherstellers as $zeile):
	    echo $html->tableCells( array(
			$zeile['Flugzeughersteller']['id'],
			$html->link($zeile['Flugzeughersteller']['name'], "/flugzeugherstellers/view/".$zeile['Flugzeughersteller']['id']),
			$html->link('Ändern', "/flugzeugherstellers/edit/{$zeile['Flugzeughersteller']['id']}"),
			$html->link('Löschen', "/flugzeugherstellers/delete/{$zeile['Flugzeughersteller']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	endforeach; 

    echo $html->tag('/table'); 
?>
