<?php
	echo $excel->header( "ThinkLogic", "Rent-A-Jet"  );
	echo $excel->worksheetHeader( "Worksheet 1" );
	echo $excel->tableHeader();
	
	if (count($this->data->ReportSet) > 0){
		$keys = array_keys($this->data->ReportSet[0]['flugzeugtypen']);
		echo $excel->rowHeader();
		foreach($keys as $elem){
			echo $excel->cell($elem,true);
		}
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
	
	echo $excel->tableFooter();
	echo $excel->worksheetOptions();
	echo $excel->worksheetFooter(  );
	echo $excel->footer(  );
?>

