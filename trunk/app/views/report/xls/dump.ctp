<?php
	echo $excel->header( "ThinkLogic", "Rent-A-Jet"  );
	echo $excel->worksheetHeader( "Worksheet 1" );
	echo $excel->tableHeader();
	
	foreach ($this->data->ReportSet as $zeile):
		echo $excel->rowHeader();
		$lala = array();
		$count = 0;
		foreach ($zeile as $element){
			echo $excel->cellHeader();
			echo $excel->cellData($element);
			echo $excel->cellFooter();
		}
		echo $excel->rowFooter();
	endforeach;
	
	echo $excel->tableFooter();
	echo $excel->worksheetFooter(  );
	echo $excel->footer(  );
?>

