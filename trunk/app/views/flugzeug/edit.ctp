<h2>Flugzeug ändern</h2>
<?php

    var_dump($this->data);
    echo $ajax->form('edit','post',array('update'=>'divFlugzeuge','url' => array('controller' => 'flugzeuge','action' => 'edit')));

    echo $form->input('id',array('type' => 'hidden'));
    echo $form->input('kennzeichen', array('label'=>'Kennzeichen','error'=>array('required'=>'Bitte das eindeutige Kennzeichen eingeben','length'=>'Das Feld darf nicht laenger als 14 Zeichen sein')));
    echo $form->input('flugzeugtyp_id', array('label'=>'Flugzeugtyp','options' => $typenliste));//auswahlbox anzeigen

    echo $form->submit('Speichern');
    echo $form->end();
?>