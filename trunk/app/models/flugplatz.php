<?php

/**
 *
 * @abstract Modell fuer Flugzeugtypen
 *
 * @author anbehren
 *
 */

class Flugplatz extends AppModel {
    //Das ist ein Array mit Valididierungsrichtilinien
    //ist optional. Wenn nicht vorhanden, wird nicht
    //validiert
    public $displayField = 'name';
    public $validate = array(
        'name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49))),
        'iata' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>9))),
        'geoPosition' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>34)))
    );
}

?>