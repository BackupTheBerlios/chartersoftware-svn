<div id="txtcontent" class="normal">
<h2>Mehrwertsteuersätze</h2>

<?php 
	echo $html->link('Neues Satz anlegen','/mehrwertsteuersaetze/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Beschreibung', 'Satz', 'Skalierung', 'Ändern','Löschen'));

    foreach ($mehrwertsteuersaetze as $zeile):
	    echo $html->tableCells( array(
			$zeile['Mehrwertsteuersatz']['id'],
			$html->link($zeile['Mehrwertsteuersatz']['beschreibung'], "/mehrwertsteuersaetze/view/".$zeile['Mehrwertsteuersatz']['id']),
			$zeile['Mehrwertsteuersatz']['satz'],
			$zeile['Mehrwertsteuersatz']['scale'],
        	$html->link('Ändern', "/mehrwertsteuersaetze/edit/{$zeile['Mehrwertsteuersatz']['id']}"),
			$html->link('Löschen', "/mehrwertsteuersaetze/delete/{$zeile['Mehrwertsteuersatz']['id']}", null, 'Sind Sie sich sicher?' )
    	));
	endforeach; 

    echo $html->tag('/table'); 
?>
</div>