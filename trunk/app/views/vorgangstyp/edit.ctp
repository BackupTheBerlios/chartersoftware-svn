<?php
    echo $form->create('Vorgangstyp', array('action' => 'edit', 'class'=>'yform columnar'));
    echo $form->input('id',array('type' => 'hidden'));
    echo $form->input('Vorgangstyp.beschreibung', array('div'=>'type-text','label'=>'Beschreibung','error'=>array('required'=>'Bitte das eindeutige Kennzeichen eingeben','length'=>'Das Feld darf nicht laenger als 24 Zeichen sein')));

	//Form Abschluss mit Speicher-Button
    echo $form->end(array('label'=>'Speichern','div'=>'type-button'));
?>
