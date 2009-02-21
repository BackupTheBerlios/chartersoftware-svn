<h2>Flugplatz Entfernung aendern</h2>
<?php
    echo $form->create('Flugplatzentfernung', array('action' => 'edit'));

    $flugplatzModell = new Flugplatz(); 
    $flugplatz =$flugplatzModell->find('list');
    
    //Anzeigen einer Auswahlbox fuer Hersteller
    echo $form->input('flugplatzstart_id', array('label'=>'Startflugplatz', 'options' => $flugplatz));//auswahlbox anzeigen
    echo $form->input('flugplatzziel_id', array('label'=>'Zielflugplatz', 'options' => $flugplatz));//auswahlbox anzeigen

    echo $form->input('entfernung', array('label'=>'Entfernung'));

    echo $form->submit('Speichern');
    echo $form->end();
?>