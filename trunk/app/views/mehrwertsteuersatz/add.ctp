<h2>Mehrwertsteuersatz zufügen</h2>
<?php
    echo $form->create('Mehrwertsteuersatz', array('action' => 'add'));
    
    echo $form->input('beschreibung', array('label'=>'Beschreibung','error'=>array('required'=>'Bitte das eindeutige Kennzeichen eingeben','length'=>'Das Feld darf nicht laenger als 24 Zeichen sein')));
    echo $form->input('satz', array('label'=>'Steuersatz'));
    echo $form->input('scale', array('label'=>'Skalierung'));

    echo $form->end('Speichern');
?>