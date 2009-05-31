<?php
    echo $rentform->create('Preistest', 'index');
    echo $rentform->select('start_id', $Flugplaetze);
    echo $rentform->select('ziel_id', $Flugplaetze);
    echo $rentform->disabledTextInput('Entfernung.distance');
    echo $rentform->end('Berechnen');
?>

