<div id="txtcontent" class="normal">
<h2>Vorgangstypen</h2>

<?php 
	echo $html->link('Neuen Vorgang anlegen','/vorgangstypen/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Beschreibung', 'Ändern','Löschen'));

    foreach ($vorgangstypen as $zeile):
	    echo $html->tableCells( array(
			$zeile['Vorgangstyp']['id'],
			$html->link($zeile['Vorgangstyp']['beschreibung'], "/vorgangstypen/view/".$zeile['Vorgangstyp']['id']),
        	$html->link('Ändern', "/vorgangstypen/edit/{$zeile['Vorgangstyp']['id']}"),
			$html->link('Löschen', "/vorgangstypen/delete/{$zeile['Vorgangstyp']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	endforeach; 

    echo $html->tag('/table'); 
?>
</div>