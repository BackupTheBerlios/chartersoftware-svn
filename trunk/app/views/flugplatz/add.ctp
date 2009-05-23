<div id="txtcontent" class="normal">
<h2>Flugplatz zufügen</h2>
<?php
	echo $form->create('Flugplatz');

    echo $form->input('Flugplatz.name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Flugplatz.iata', array('error'=>array('required'=>'Bitte internationale Abkürzung eingeben','length'=>'Das Feld darf nicht laenger als 9 Zeichen sein')));
    echo $form->input('Flugplatz.geoPosition', array('error'=>array('required'=>'Bitte geografische Position des Flugplatzes eingeben','length'=>'Das Feld darf nicht laenger als 34 Zeichen sein')));

    //Anzeigen einer Auswahlbox fuer Zeitzone
    echo $form->input('zeitzone_id', array('options' => $zeitzonenliste));//auswahlbox anzeigen

    echo $form->end('Speichern');
?>
</div>