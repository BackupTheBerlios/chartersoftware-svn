<?php
    echo $form->create('Adresse', array('action' => 'index', 'class'=>'yform columnar'));
    echo $form->input('Adresse.id', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Adresse.firma', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Adresse.abteilung', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Adresse.ansprechpartner', array('div'=>'type-text', 'disabled'=>'disabled'));
    echo $form->input('Adresse.strasse', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Adresse.plz', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Adresse.ort', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->end(array('label'=>'Schließen','div'=>'type-button'));
?>
