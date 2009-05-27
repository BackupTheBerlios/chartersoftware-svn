<?php
    echo $html->tag('table');
//    echo $html->tableHeaders(array('Firma', 'Name', 'Straße','PLZ','Ort','Details','Ändern','Löschen'));

	foreach ($this->data->ReportSet as $zeile):
		$col = array();
		$count = 0;
		foreach ($zeile as $value) {
    		//echo "Der aktuelle Wert ist: " . var_dump($value) . "<br>";
    		$col[$count++]=$value;
  		}
	    echo $html->tableCells($col);
    endforeach;
    echo $html->tag('/table');
?>
