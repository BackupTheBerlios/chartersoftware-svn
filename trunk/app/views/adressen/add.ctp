<?php
    echo $rentform->create('Adresse', 'add');
    echo $rentform->textInput('Adresse.firma');
    echo $rentform->textInput('Adresse.abteilung');
    echo $rentform->textInput('Adresse.ansprechpartner');
    echo $rentform->textInput('Adresse.strasse');
    echo $rentform->textInput('Adresse.plz');
    echo $rentform->textInput('Adresse.ort');
    echo $rentform->end('Speichern');
?>
