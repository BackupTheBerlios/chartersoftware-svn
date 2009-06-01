<?php
    echo $rentform->create('Vorgang', 'berechnen');
    echo $rentform->select('start_id', $Flugplaetze);
    echo $rentform->select('ziel_id', $Flugplaetze);
    echo $rentform->disabledTextInput('Vorgang.distance');
    echo $rentform->end('Berechnen');
?>

