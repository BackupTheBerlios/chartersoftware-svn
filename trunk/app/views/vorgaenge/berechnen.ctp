<?php
    echo $rentform->create('Vorgang', 'berechnen');
    echo $rentform->textInput('entfernung', $entfernung);
    echo $rentform->select('flugzeugtyp', $flugzeugtypenliste);
    echo $rentform->textInput('AnzahlFlugbegleiter');
    echo $rentform->disabledTextInput('Vorgang.landungen');
    echo $rentform->disabledTextInput('Vorgang.vmax');
    echo $rentform->disabledTextInput('Vorgang.offiziere');
    echo $rentform->disabledTextInput('Vorgang.minBegleiter');
    echo $rentform->disabledTextInput('Vorgang.istBegleiter');
    echo $rentform->disabledTextInput('Vorgang.flugzeit');
    echo $rentform->disabledTextInput('Vorgang.reisezeit');
    echo $rentform->disabledTextInput('Vorgang.personalkosten');
    echo $rentform->disabledTextInput('Vorgang.kostenZielflug');
    echo $rentform->end('Berechnen');
?>

