<?php
    echo $form->create('Report', array('class'=>'yform columnar'));
    echo $form->input('Report.name', array('div'=>'type-text', 'error'=>array('length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->label('Report.befehl',$this->data->id ,array('div'=>'type-text'));
    echo $form->textarea('Report.befehl', array('div'=>'type-text','cols'=>50, 'rows'=>10));
    echo $form->end(array('label'=>'Speichern','div'=>'type-button'));
?>
