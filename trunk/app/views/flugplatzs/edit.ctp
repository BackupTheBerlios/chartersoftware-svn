<h2>Flugplatz zufuegen</h2>
<?php
    echo $form->create('Flugplatz', array('action' => 'edit'));
    
    echo $form->input('Flugplatz.name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Flugplatz.iata', array('error'=>array('required'=>'Bitte internationale Abk�rzung eingeben','length'=>'Das Feld darf nicht laenger als 9 Zeichen sein')));
    echo $form->input('Flugplatz.geoPosition', array('error'=>array('required'=>'Bitte geografische Position des Flugplatzes eingeben','length'=>'Das Feld darf nicht laenger als 14 Zeichen sein')));

    //Anzeigen einer Auswahlbox fuer Hersteller
    $zeitzoneModell = new Zeitzone();
    echo $form->input('zeitzone_id', array('options' => $zeitzoneModell->find('list')));//auswahlbox anzeigen

    echo $form->submit('Speichern');
    echo $form->end();
?>
