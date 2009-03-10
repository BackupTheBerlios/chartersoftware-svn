<h2>Flugzeugtyp zufuegen</h2>
<?php
	echo $form->create('Flugzeugtyp');
	
    echo $form->input('name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));

    //Anzeigen einer Auswahlbox fuer Hersteller
    echo $form->input('flugzeughersteller_id', array('label'=>'Hersteller','options' => $herstellerliste));//auswahlbox anzeigen

    echo $form->input('Flugzeugtyp.reichweite', array('label'=>'Reichweite'));
    echo $form->input('Flugzeugtyp.vmax', array('label'=>'Geschwindigkeit'));
    
    echo $form->input('Flugzeugtyp.bild', array('label'=>'Bild URL'));
    echo $form->input('Flugzeugtyp.jahreskosten', array('label'=>'Jährliche Kosten'));
    echo $form->input('Flugzeugtyp.stundenkosten', array('label'=>'Stündliche Kosten'));
    echo $form->input('Flugzeugtyp.crewPersonal', array('label'=>'Crew Personal'));
    echo $form->input('Flugzeugtyp.cabinPersonal', array('label'=>'Kabinenpersonal'));

    echo $form->end('Speichern');
?>