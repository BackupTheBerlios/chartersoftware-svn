<h2>Flugplatz zufuegen</h2>
<?php
    echo $form->create('Flugplatz', array('action' => 'edit'));
    
    echo $form->input('Flugplatz.name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Flugplatz.internatKuerzel', array('error'=>array('required'=>'Bitte internationale AbkŸrzung eingeben','length'=>'Das Feld darf nicht laenger als 4 Zeichen sein')));

    //Anzeigen einer Auswahlbox fuer Hersteller
    $zeitzoneModell = new Zeitzone();
    echo $form->input('zeitzone_id', array('options' => $zeitzoneModell->find('list')));//auswahlbox anzeigen

    echo $form->submit('Speichern');
    echo $form->end();
?>
