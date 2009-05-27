<?php

    echo $form->create('Report', array('action' => 'select', 'class'=>'yform columnar'));
    echo $form->label('Report.id', 'Wählen sie einen Report-Typen...');
	echo $form->input('report_id', array('div'=>'type-select','options' => $Reportliste));//auswahlbox anzeigen
	echo $form->input('report_typ', array('div'=>'type-select', 'options' => $Reporttyp));
	
    echo $form->end(array('label'=>'Report Erstellen','div'=>'type-button'));
?>
