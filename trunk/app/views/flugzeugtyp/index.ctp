<div id="txtcontent" class="normal">
<h2>Flugzeugtyp</h2>

<?php 
	echo $html->link('Neuen Flugzeugtyp anlegen','/flugzeugtypen/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Bild', 'Name', 'Hersteller','Kosten Jahr','Kosten Stunde','Crew','Kabine','Ändern','Löschen'));

    foreach ($flugzeugtypen as $zeile):
	    echo $html->tableCells( array(
    	    $zeile['Flugzeugtyp']['id'],
        	$html->image($zeile['Flugzeugtyp']['bild'],array('width'=>'90' )),
        	$html->link($zeile['Flugzeugtyp']['name'], "/flugzeugtypen/view/".$zeile['Flugzeugtyp']['id']),
        	$html->link($zeile['Flugzeughersteller']['name'], "/flugzeughersteller/view/".$zeile['Flugzeughersteller']['id']),
        	number_format($zeile['Flugzeugtyp']['jahreskosten'] / 100,2 , ",", "."),
        	number_format($zeile['Flugzeugtyp']['stundenkosten'] / 100,2 , ",", "."),
        	$zeile['Flugzeugtyp']['crewPersonal'],
        	$zeile['Flugzeugtyp']['cabinPersonal'],
        	$html->link('Ändern', "/flugzeugtypen/edit/{$zeile['Flugzeugtyp']['id']}"),
        	$html->link('Löschen', "/flugzeugtypen/delete/{$zeile['Flugzeugtyp']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	
    endforeach;
    echo $html->tag('/table'); 
?>
</div>