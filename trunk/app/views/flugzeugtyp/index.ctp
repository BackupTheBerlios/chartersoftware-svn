<?php 
	echo $html->link('Neuen Flugzeugtyp anlegen','/flugzeugtypen/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Bild', 'Name', 'Hersteller','Crew','Kabine','Sitze','Ändern','Löschen'));

    foreach ($flugzeugtypen as $zeile):
	    echo $html->tableCells( array(
    	    $zeile['Flugzeugtyp']['id'],
        	$html->image($zeile['Flugzeugtyp']['bild'],array('width'=>'90' )),
        	$html->link($zeile['Flugzeugtyp']['name'], "/flugzeugtypen/view/".$zeile['Flugzeugtyp']['id']),
        	$html->link($zeile['Flugzeughersteller']['name'], "/flugzeughersteller/view/".$zeile['Flugzeughersteller']['id']),
        	$zeile['Flugzeugtyp']['crewPersonal'],
        	$zeile['Flugzeugtyp']['cabinPersonal'],
        	$zeile['Flugzeugtyp']['seats'],
        	$html->link('Ändern', "/flugzeugtypen/edit/{$zeile['Flugzeugtyp']['id']}"),
        	$html->link('Löschen', "/flugzeugtypen/delete/{$zeile['Flugzeugtyp']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	
    endforeach;
    echo $html->tag('/table'); 
?>
