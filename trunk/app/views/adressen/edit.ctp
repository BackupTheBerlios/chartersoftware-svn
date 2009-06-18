<?php
    echo $rentform->create('Adresse', 'edit');
    echo $rentform->hidden('id');
    echo $rentform->textInput('firma');
    echo $rentform->textInput('abteilung');
    echo $rentform->textInput('ansprechpartner');
    echo $rentform->textInput('strasse');
    echo $rentform->textInput('plz');
    echo $rentform->textInput('ort');
    echo $rentform->end('Speichern');
?>
