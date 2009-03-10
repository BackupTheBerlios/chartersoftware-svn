<h2>Flugzeug ändern</h2>
<?php
    echo $form->create('Flugzeug', array('action' => 'edit'));
    echo $form->input('kennzeichen', array('label'=>'Kennzeichen','error'=>array('required'=>'Bitte das eindeutige Kennzeichen eingeben','length'=>'Das Feld darf nicht laenger als 14 Zeichen sein')));
    echo $form->input('flugzeugtyp_id', array('label'=>'Flugzeugtyp','options' => $typenliste));//auswahlbox anzeigen

    echo $form->end('Speichern');
?>