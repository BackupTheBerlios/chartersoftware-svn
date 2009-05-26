<?php
    echo $form->create('Report', array('action'=>'add','class'=>'yform columnar'));
    echo $form->input('Report.name', array('div'=>'type-text', 'error'=>array('length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Report.befehl', array('type'=>'images','div'=>'type-text'));
    echo $form->end(array('label'=>'Speichern','div'=>'type-button'));
?>
