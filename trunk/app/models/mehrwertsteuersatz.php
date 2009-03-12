<?php


class Mehrwertsteuersatz extends AppModel {
    //Das ist der Name des Modells
    //wird als Instanzvariable bei Datenzugriffen
    //benutzt
    public $name = 'Mehrwertsteuersatz';


    //Das ist ein Array mit Valididierungsrichtilinien
    //ist optional. Wenn nicht vorhanden, wird nicht
    //validiert
    public $validate = array(
        'beschreibung' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>24))),
        'satz' => array('required'=>VALID_NOT_EMPTY),
        'scale' => array('required'=>VALID_NOT_EMPTY)
    );
}

?>