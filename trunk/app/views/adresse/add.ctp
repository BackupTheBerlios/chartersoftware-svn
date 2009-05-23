<div id="txtcontent" class="normal">
<h2>Adresse ändern</h2>
<?php
    echo $form->create('Adresse');
    echo $form->input('id',array('type' => 'hidden'));
    echo $form->input('Adresse.firma', array('error'=>array('length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.abteilung', array('error'=>array('length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.ansprechpartner', array('error'=>array('required'=>'Bitte den Ansprechpartner eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.strasse', array('error'=>array('required'=>'Bitte die Straße des Kunden eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('Adresse.plz', array('error'=>array('required'=>'Bitte die Postleitzahl eingeben','length'=>'Das Feld darf nicht laenger als 5 Zeichen sein')));
    echo $form->input('Adresse.ort', array('error'=>array('required'=>'Bitte den Ort eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->end('Speichern');
?>
</div>
