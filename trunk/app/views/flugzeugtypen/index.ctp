<?php 
	echo $html->link('Neuen Flugzeugtyp anlegen','/flugzeugtypen/add', array('class'=>'button1', 'style'=>'width:150px;'));
    echo $html->tag('table', Null, array('class' => 'tbl1'));
    echo $html->tableHeaders(array('Bild', 'Name', 'Hersteller','Crew','Kabine','Sitze','Ändern','Löschen'));

    foreach ($this->data as $zeile):
	    echo $html->tableCells( array(
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
