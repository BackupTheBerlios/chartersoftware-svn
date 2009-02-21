<h2>Flugzeugtyp zufuegen</h2>
<?php
	echo $form->create('Flugzeugtyp');
	
    echo $form->input('Flugzeugtyp.name', array('error'=>array('required'=>'Bitte den Namen eingeben','length'=>'Das Feld darf nicht laenger als 49 Zeichen sein')));

    //Anzeigen einer Auswahlbox fuer Hersteller
    $herstellerModell = new Flugzeughersteller(); //Modell fuer Flugzeughersteller erzeugen
    echo $form->input('flugzeughersteller_id', array('options' => $herstellerModell->find('list')));//auswahlbox anzeigen

    echo $form->input('Flugzeugtyp.reichweite', array('label'=>'Reichweite'));
    echo $form->input('Flugzeugtyp.vmax', array('label'=>'Geschwindigkeit'));

	echo $form->submit('Speichern');
 	echo $form->end();
?>