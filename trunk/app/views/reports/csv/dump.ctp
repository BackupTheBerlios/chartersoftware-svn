<?php
	foreach ($this->data->ReportSet as $zeile):
		foreach ($zeile as $spalte):
			foreach($spalte as $wert):
				if (is_numeric($wert)){
					echo $wert . ', ';
				} else {
					echo '"'.$wert . '", ';
				}
			endforeach;
  		endforeach;
	    echo "\n";
    endforeach;
?>