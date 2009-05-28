<?php

    echo $form->create('Report', array('action' => 'select', 'class'=>'yform columnar'));
    echo $form->label('', 'Wählen sie eine eine Statistik...');
    echo $form->label('', '&nbsp');
	echo $form->input('Ausgabeformat', array('div'=>'type-select','options' => $Ausgabeformat));//auswahlbox anzeigen
	echo $form->input('Ausgabeziel', array('div'=>'type-select', 'options' => $Ausgabezielliste));
	
    echo $form->end(array('label'=>'Report Erstellen','div'=>'type-button'));
?>
