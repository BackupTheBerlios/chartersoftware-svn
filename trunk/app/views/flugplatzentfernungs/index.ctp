<h2>Entfernung zwischen Flugplaetzen</h2>

<?php 
	echo $html->link('Neue Flugplatz-Entfernung anlegen','/flugplatzentfernungs/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Start-Flugplatz', 'Ziel-Flugplatz', 'Entfernung','Ändern','Löschen'));

    $flugplatzModell = new Flugplatz(); 
    $flugplatz =$flugplatzModell->find('list');

	foreach ($flugplatzentfernungs as $zeile):
	    echo $html->tableCells( array(
			$zeile['Flugplatzentfernung']['id'],
			$flugplatz[$zeile['Flugplatzentfernung']['flugplatzstart_id']],
        	$flugplatz[$zeile['Flugplatzentfernung']['flugplatzziel_id']],
        	$zeile['Flugplatzentfernung']['entfernung'],
			$html->link('Ändern', "/flugplatzentfernungs/edit/{$zeile['Flugplatzentfernung']['id']}"),
			$html->link('Löschen', "/flugplatzentfernungs/delete/{$zeile['Flugplatzentfernung']['id']}", null, 'Sind Sie sich sicher?' ),
    	));
    endforeach;
    echo $html->tag('/table'); 
?>