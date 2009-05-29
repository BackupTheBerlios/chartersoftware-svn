<?php

/**
 *
 * @abstract Modell fuer Leistungstypen
 *
 * @author anbehren
 *
 */

class Leistungstyp extends AppModel {
    //Das ist der Name des Modells
    //wird als Instanzvariable bei Datenzugriffen
    //benutzt
    public $name = 'Leistungstyp';


    //Das ist ein Array mit Valididierungsrichtlinien
    public $validate = array(
        'beschreibung' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>24)))
    );
}

?>