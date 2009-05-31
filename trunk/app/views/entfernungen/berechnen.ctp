<?php
    echo $rentform->create('Entfernung', 'berechnen');
    echo $rentform->select('start_id', $Flugplaetze);
    echo $rentform->select('ziel_id', $Flugplaetze);
    echo $rentform->disabledTextInput('Entfernung.distance');
    echo $rentform->end('Berechnen');
?>

