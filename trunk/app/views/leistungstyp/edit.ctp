<?php
    echo $form->create('Leistungstyp', array('action' => 'edit', 'class'=>'yform columnar'));
    echo $form->input('Leistungstyp.id',array('type' => 'hidden'));
    echo $form->input('Leistungstyp.beschreibung', array('div'=>'type-text', 'error'=>array('length'=>'Das Feld darf nicht laenger als 24 Zeichen sein')));
    echo $form->end(array('label'=>'Speichern','div'=>'type-button'));
?>
