<?php
    echo $form->create('Report', array('action' => 'edit', 'class'=>'yform columnar'));
    echo $form->input('Report.id',array('type' => 'hidden'));
    echo $form->input('Report.name', array('div'=>'type-text', 'error'=>array('length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Report.befehl',array('type'=>'image','div'=>'type-text'));
    echo $form->end(array('label'=>'Speichern','div'=>'type-button'));
?>
