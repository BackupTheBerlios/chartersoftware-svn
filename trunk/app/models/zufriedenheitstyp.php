<?php

/**
 *
 * @abstract Modell fuer Leistungstypen
 *
 * @author anbehren
 *
 */

class Zufriedenheitstyp extends AppModel {
    //Das ist der Name des Modells
    //wird als Instanzvariable bei Datenzugriffen
    //benutzt
    public $name = 'Zufriedenheitstyp';


    //Das ist ein Array mit Valididierungsrichtlinien
    public $validate = array(
        'beschreibung' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>24)))
    );
}

?>