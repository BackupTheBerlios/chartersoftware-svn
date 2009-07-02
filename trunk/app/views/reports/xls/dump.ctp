<?php
	echo $excel->header( "ThinkLogic", "Rent-A-Jet"  );
	echo $excel->worksheetHeader( "Worksheet 1" );
	
	//Ausgabe Tabellenheader
	if (count($this->data->ReportSet) > 0){
		//Erstes Sub-Array holen
		$temp = array_keys($this->data->ReportSet[0]);

		//Fette Kopfzeile
		echo $excel->rowHeader();
		foreach($temp as $elem) echo $excel->cell($elem,true);

		echo $excel->rowFooter();
		
	}

	
	foreach ($this->data->ReportSet as $zeile):
		echo $excel->rowHeader();
		foreach ($zeile as $element){
			echo $excel->cell($element);
		}
		echo $excel->rowFooter();
	endforeach;

	echo $excel->worksheetFooter(  );
	echo $excel->footer(  );
?>

