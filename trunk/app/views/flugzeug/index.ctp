<h2>Flugzeuge</h2>

<?php 
	echo $html->link('Neues Flugzeug anlegen','/flugzeug/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Kennzeichen', 'Typ', 'Ändern','Löschen'));

    foreach ($flugzeuge as $zeile):
	    echo $html->tableCells( array(
			$zeile['Flugzeug']['id'],
			$html->link($zeile['Flugzeug']['kennzeichen'], "/flugzeug/view/".$zeile['Flugzeug']['id']),
			$html->link($zeile['Flugzeugtyp']['name'], "/flugzeugtyps/view/".$zeile['Flugzeugtyp']['id']),
        	$html->link('Ändern', "/flugzeug/edit/{$zeile['Flugzeug']['id']}"),
			$html->link('Löschen', "/flugzeug/delete/{$zeile['Flugzeug']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	endforeach; 

    echo $html->tag('/table'); 
?>