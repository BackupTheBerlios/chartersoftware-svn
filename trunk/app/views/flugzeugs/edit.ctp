<h2>Flugzeug ändern</h2>
<?php
    echo $form->create('Flugzeug', array('action' => 'edit'));
    
    echo $form->input('kennzeichen', array('label'=>'Kennzeichen','error'=>array('required'=>'Bitte das eindeutige Kennzeichen eingeben','length'=>'Das Feld darf nicht laenger als 14 Zeichen sein')));

    //Anzeigen einer Auswahlbox fuer Typ
    $typModell = new Flugzeugtyp(); //Modell fuer Flugzeugtyp erzeugen
    echo $form->input('flugzeugtyp_id', array('label'=>'Flugzeugtyp','options' => $typModell->find('list')));//auswahlbox anzeigen

    echo $form->submit('Speichern');
    echo $form->end();
?>