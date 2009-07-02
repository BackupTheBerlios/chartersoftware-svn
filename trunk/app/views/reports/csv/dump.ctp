<?php
	//Ausgabe Tabellenheader
	if (count($this->data->ReportSet) > 0){
		//Erstes Sub-Array holen
		$temp = array_keys($this->data->ReportSet[0]);

		//Fette Kopfzeile
		foreach($temp as $wert) echo '"'.$wert . '", ';
	    echo "\n";
		
	}

	foreach ($this->data->ReportSet as $zeile){
		foreach ($zeile as $wert){
			if (is_numeric($wert)){
				echo $wert . ', ';
			} else {
				echo '"'.$wert . '", ';
			}
		}
	    echo "\n";
	}
?>
