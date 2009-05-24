<?php
    echo $form->create('Flugzeugtyp', array('action' => 'edit', 'class'=>'yform columnar'));
    echo $form->input('id',array('type' => 'hidden'));

    echo $form->input('Flugzeugtyp.name', array('div'=>'type-text','error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));

    echo $form->input('flugzeughersteller_id', array('div'=>'type-select','label'=>'Hersteller','options' => $herstellerliste));//auswahlbox anzeigen

    echo $form->input('Flugzeugtyp.reichweite', array('div'=>'type-text','label'=>'Reichweite'));
    echo $form->input('Flugzeugtyp.vmax', array('div'=>'type-text','label'=>'Geschwindigkeit'));

    echo $form->input('Flugzeugtyp.bild', array('div'=>'type-text','label'=>'Bild URL'));
    echo $form->input('Flugzeugtyp.jahreskosten', array('div'=>'type-text','label'=>'Jährliche Kosten'));
    echo $form->input('Flugzeugtyp.stundenkosten', array('div'=>'type-text','label'=>'Stündliche Kosten'));
    echo $form->input('Flugzeugtyp.crewPersonal', array('div'=>'type-text','label'=>'Crew Personal'));
    echo $form->input('Flugzeugtyp.cabinPersonal', array('div'=>'type-text','label'=>'Kabinenpersonal'));

	//Form Abschluss mit Speicher-Button
    echo $form->end(array('label'=>'Speichern','div'=>'type-button'));
?>
