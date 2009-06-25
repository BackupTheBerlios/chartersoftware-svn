<?php

class Vorgangstyp extends AppModel {
    //Das ist ein Array mit Valididierungsrichtilinien
    //ist optional. Wenn nicht vorhanden, wird nicht
    //validiert
    public $displayField = 'beschreibung';
    public $validate = array(
       'beschreibung' => array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 24),'message'=>'Die Beschreibung darf maximal 24 Zeichen lang sein')),
    );

    //Datenbank-Assoziationen
    //var $belongsTo = array('Zeitzone');
}

?>