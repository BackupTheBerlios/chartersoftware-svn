<h2>Entfernungsberechnungen</h2>

<?php
    echo $form->create('Entfernung', array('action' => 'index'));

    $modell = new Flugplatz(); //Modell fuer Flugzeugtyp erzeugen
    $list = $modell->find('list');
    //$entfernung = $Entfernung['von'];


    echo $form->input('von', array('label'=>'Start','options' => $list));//auswahlbox anzeigen
    echo $form->input('zu', array('label'=>'Ziel','options' => $list));//auswahlbox anzeigen

    if (isset ($this->params) && isset ($this->params['data']) ) {
        //Auslesen der uerbegebenen Parameter
        $von = $this->params['data']['Entfernung']['von'];
        $zu = $this->params['data']['Entfernung']['zu'];
        echo $form->label('Entfernung', 'von ' . $von . ' nach ' . $zu);

        //Suchen der eigentlichen Daten
        $model = new Flugplatz();
        $vonPositon = $model->findById($von);
        $zuPositon = $model->findById($zu);

        //Ausgabe der Position
        echo $form->label('Von: '. $vonPositon['Flugplatz']['geoPosition']);
        echo $form->label('Zu: '. $zuPositon['Flugplatz']['geoPosition']);
    } else {
        echo $form->label('Wählen Sie Start- und Zielflugplatz');
    }

    echo $form->submit('Berechnen');

    echo $form->end();
?>
