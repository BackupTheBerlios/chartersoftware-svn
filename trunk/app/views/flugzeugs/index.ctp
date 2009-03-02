<h2>Flugzeuge</h2>

<?php 
	echo $html->link('Neues Flugzeug anlegen','/flugzeugs/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Kennzeichen', 'Typ', 'Ändern','Löschen'));

    foreach ($flugzeugs as $zeile):
	    echo $html->tableCells( array(
			$zeile['Flugzeug']['id'],
			$html->link($zeile['Flugzeug']['kennzeichen'], "/flugzeugs/view/".$zeile['Flugzeug']['id']),
			$html->link($zeile['Flugzeugtyp']['name'], "/flugzeugtyps/view/".$zeile['Flugzeugtyp']['id']),
        	$html->link('Ändern', "/flugzeugs/edit/{$zeile['Flugzeug']['id']}"),
			$html->link('Löschen', "/flugzeugs/delete/{$zeile['Flugzeug']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	endforeach; 

    echo $html->tag('/table'); 
?>