<h2>Vorgangstyp zufügen</h2>
<?php
    echo $form->create('Vorgangstyp', array('action' => 'add'));
    
    echo $form->input('beschreibung', array('label'=>'Beschreibung','error'=>array('required'=>'Bitte das eindeutige Kennzeichen eingeben','length'=>'Das Feld darf nicht laenger als 24 Zeichen sein')));

    echo $form->submit('Speichern');
    echo $form->end();
?>