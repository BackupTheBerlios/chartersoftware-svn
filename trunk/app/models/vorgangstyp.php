<?php

class Vorgangstyp extends AppModel {
    //Das ist der Name des Modells
    //wird als Instanzvariable bei Datenzugriffen
    //benutzt
    public $name = 'Vorgangstyp';


    //Das ist ein Array mit Valididierungsrichtilinien
    //ist optional. Wenn nicht vorhanden, wird nicht
    //validiert
    public $validate = array(
        'beschreibung' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>24)))
    );

    //Datenbank-Assoziationen
    //var $belongsTo = array('Zeitzone');
}

?>