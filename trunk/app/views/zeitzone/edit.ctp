<h2>Ändern einer Zeitzone</h2>
<?php
    $ajax->form('edit','post',array('model'=>'Zeitzone','update'=>'UserInfoDiv'));
	//echo $form->create('Zeitzone', array('action' => 'edit'));
	
    echo $form->input('id', array('type'=>'hidden')); 
    
    echo $form->input('name', array('error'=>array('required'=>'Bitte den Namen einer Zeitzone eingeben','length'=>'Das Feld darf nicht laenger als 29 Zeichen sein')));
    echo $form->input('differenzUtc', array('error'=>array('required'=>'Bitte Differenz zur lokalen Zeit eingeben','length'=>'Das Feld darf nicht laenger als 3 Zeichen sein')));

    echo $form->end('Speichern');
?>