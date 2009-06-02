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
    echo $rentform->disabledTextInput('Vorgang.kostenZeitflug');
    echo $rentform->disabledTextInput('Vorgang.mwstsatz');
    echo $rentform->disabledTextInput('Vorgang.mwstZielflug');
    echo $rentform->disabledTextInput('Vorgang.mwstZeitflug');
    echo $rentform->disabledTextInput('Vorgang.bruttoZielflug');
    echo $rentform->disabledTextInput('Vorgang.bruttoZeitflug');
    echo $rentform->end('Berechnen');
?>

