<?php
    echo $form->create('Mehrwertsteuersatz', array('action' => 'add', 'class'=>'yform columnar'));

    echo $form->input('Mehrwertsteuersatz.beschreibung', array('div'=>'type-text','error'=>array('required'=>'Bitte die Beschreibung eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Mehrwertsteuersatz.satz', array('div'=>'type-text','label'=>'Satz'));
    echo $form->input('Mehrwertsteuersatz.scale', array('div'=>'type-text','label'=>'Skalierung'));

	//Form Abschluss mit Speicher-Button
    echo $form->end(array('label'=>'Speichern','div'=>'type-button'));
?>
