<?php
    echo $form->create('Adresse', array('action' => 'edit', 'url'=>'/adressen','class'=>'yform columnar'));
    echo $form->input('Adresse.id',array('type' => 'hidden'));
    echo $form->input('Adresse.firma', array('div'=>'type-text', 'error'=>array('length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.abteilung', array('div'=>'type-text', 'error'=>array('length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.ansprechpartner', array('div'=>'type-text', 'error'=>array('required'=>'Bitte den Ansprechpartner eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.strasse', array('div'=>'type-text', 'error'=>array('required'=>'Bitte die Straße des Kunden eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.plz', array('div'=>'type-text', 'error'=>array('required'=>'Bitte die Postleitzahl eingeben','length'=>'Das Feld darf nicht laenger als 5 Zeichen sein')));
    echo $form->input('Adresse.ort', array('div'=>'type-text', 'error'=>array('required'=>'Bitte den Ort eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->end(array('label'=>'Speichern','div'=>'type-button'));
?>
