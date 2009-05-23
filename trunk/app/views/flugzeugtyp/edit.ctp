<div id="txtcontent" class="normal">
<h2>Flugzeugtyp aendern</h2>
<?php
	echo $form->create('Flugzeugtyp', array('action' => 'edit'));
    echo $form->input('id',array('type' => 'hidden'));

    echo $form->input('name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));

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
</div>