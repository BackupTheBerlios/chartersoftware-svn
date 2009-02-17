<h1>Neuen Flugplatz anlegen</h1>
<?php
echo $form->create('Flugplatz');

echo $form->input('Name');
echo $form->input('Int. AbkŸrzung');
echo $form->input('Zeitzone');
echo $form->input('Diff UTC');
echo $form->input('Geografische Position');

echo $form->end('Save Post');
?>