<div id="txtcontent" class="normal">
<h2>Vorgangstyp ändern</h2>
<?php
    echo $form->create('Vorgangstyp', array('action' => 'edit'));
    
    echo $form->input('beschreibung', array('label'=>'Beschreibung','error'=>array('required'=>'Bitte das eindeutige Kennzeichen eingeben','length'=>'Das Feld darf nicht laenger als 24 Zeichen sein')));

    echo $form->end('Speichern');
?>
</div>