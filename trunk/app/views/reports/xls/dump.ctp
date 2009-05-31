<?php
	echo $excel->header( "ThinkLogic", "Rent-A-Jet"  );
	echo $excel->worksheetHeader( "Worksheet 1" );
	
	if (count($this->data->ReportSet) > 0){
		//Erstes Sub-Array holen
		$temp = array_keys($this->data->ReportSet[0]);
		$keys = $this->data->ReportSet[0][$temp[0]];

		//Fette Kopfzeile
		echo $excel->rowHeader();
		foreach($keys as $elem=>$value) echo $excel->cell($elem,true);
		echo $excel->rowFooter();
	}
	
	foreach ($this->data->ReportSet as $zeile):
		echo $excel->rowHeader();
		foreach ($zeile as $element){
			foreach ($element as $cell){
				echo $excel->cell($cell);
			}
		}
		echo $excel->rowFooter();
	endforeach;
	
	echo $excel->worksheetFooter(  );
	echo $excel->footer(  );
?>

