<?php
    echo $form->create('Flugplatz', array('class'=>'yform columnar'));
    echo $form->input('Flugplatz.name', array('div'=>'type-text','error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Flugplatz.iata', array('div'=>'type-text','error'=>array('required'=>'Bitte internationale Abk�rzung eingeben','length'=>'Das Feld darf nicht laenger als 9 Zeichen sein')));
    echo $form->input('Flugplatz.geoPosition', array('div'=>'type-text','error'=>array('required'=>'Bitte geografische Position des Flugplatzes eingeben','length'=>'Das Feld darf nicht laenger als 14 Zeichen sein')));

    //Anzeigen einer Auswahlbox fuer Hersteller
    echo $form->input('zeitzone_id', array('div'=>'type-select','options' => $zeitzonenliste));//auswahlbox anzeigen

	//Form Abschluss mit Speicher-Button
    echo $form->end(array('label'=>'Speichern','div'=>'type-button'));
?>
