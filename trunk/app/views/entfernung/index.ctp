<h2>Entfernungsberechnungen</h2>

<?php
    echo $ajax->form('edit','post',array('update'=>'txtcontent','url' => array('controller' => 'entfernungen','action' => 'index')));

    $modell = new Flugplatz(); //Modell fuer Flugzeugtyp erzeugen
    $list = $modell->find('list');

    echo $form->input('von', array('label'=>'Start','options' => $list));//auswahlbox anzeigen
    echo $form->input('zu', array('label'=>'Ziel','options' => $list));//auswahlbox anzeigen

    if (isset ($this->params) && isset ($this->params['data']) ) {
        //Auslesen der uerbegebenen Parameter
        $von = $this->params['data']['von'];
        $zu = $this->params['data']['zu'];
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
