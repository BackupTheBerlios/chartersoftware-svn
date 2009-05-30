<h2>Angebotsliste</h2>

<?php
	echo $html->link('Neues Angebot anlegen','/angebote/add');
    echo $html->tag('table');
    echo $html->tableHeaders(array('Nummer', 'Firma','Details','Ändern','Löschen'));

    //var_dump($zeitzonen);

    echo $html->tag('/table');
?>
