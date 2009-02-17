<h1>Neuen Flugplatz anlegen</h1>
<?php
echo $form->create('Flugplatz');

echo $form->input('name');
echo $form->input('int_abk');
echo $form->input('zeitzone');
echo $form->input('diff_utc');
//echo $form->input('geoposition');

echo $form->end('Save Post');
?>

