<div id="txtcontent" class="normal">
<h2>Flugzeug Hersteller ändern</h2>
<?php
	echo $form->create('Flugzeughersteller', array('action' => 'edit'));
    echo $form->input('id',array('type' => 'hidden'));

    echo $form->input('name', array('label'=>'Name', 'error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));
    echo $form->input('link', array('label'=>'URL'));
    echo $form->input('information', array('label'=>'Informationen'));

    echo $form->end('Speichern');
?>
</div>