<?php
    echo $form->create('Zufriedenheitstyp', array('action' => 'add', 'class'=>'yform columnar'));
    echo $form->input('Zufriedenheitstyp.beschreibung', array('div'=>'type-text', 'error'=>array('length'=>'Das Feld darf nicht laenger als 24 Zeichen sein')));
    echo $form->input('Zufriedenheitstyp.isAblehnungsgrund', array('div'=>'type-select','options' => $Auswahlliste));
    echo $form->end(array('label'=>'Speichern','div'=>'type-button'));
?>
