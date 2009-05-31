<?php
    echo $html->tag('table');

	//Ausgabe Tabellenheader
	if (count($this->data->ReportSet) > 0){
		//Erstes Sub-Array holen
		$temp = array_keys($this->data->ReportSet[0]);
		$keys = $this->data->ReportSet[0][$temp[0]];
		
		//Schlüssel zu Array
		$arr = array();
		foreach($keys as $elem=>$value) array_push($arr, $elem);

		//Array als Header ausgeben
		echo $html->tableHeaders($arr);
		
	}


	//Ausgabe Daten
	foreach ($this->data->ReportSet as $zeile):
		$col = array();
		$count = 0;
		foreach ($zeile as $value) {
    		//echo "Der aktuelle Wert ist: " . var_dump($value) . "<br>";
    		$col[$count++]=$value;
  		}
	    echo $html->tableCells($col);
    endforeach;
    
    //HTML-Footer
    echo $html->tag('/table');
?>
