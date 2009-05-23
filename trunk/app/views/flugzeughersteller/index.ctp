<div id="txtcontent" class="normal">
<h2>Flugzeug Hersteller</h2>

<?php
	echo $html->link('Neuen Hersteller anlegen','/flugzeughersteller/add');
	echo $html->tag('table');
    echo $html->tableHeaders(array('Id', 'Name', 'Ändern','Löschen'));

    foreach ($flugzeughersteller as $zeile):
	    echo $html->tableCells( array(
			$zeile['Flugzeughersteller']['id'],
			$html->link($zeile['Flugzeughersteller']['name'], "/flugzeughersteller/view/".$zeile['Flugzeughersteller']['id']),
			$html->link('Ändern', "/flugzeughersteller/edit/{$zeile['Flugzeughersteller']['id']}"),
			$html->link('Löschen', "/flugzeughersteller/delete/{$zeile['Flugzeughersteller']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	endforeach;

    echo $html->tag('/table');
?>
</div>