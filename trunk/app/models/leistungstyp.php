<?php

/**
 *
 * @abstract Modell fuer Leistungstypen
 *
 * @author anbehren
 *
 */

class Leistungstyp extends AppModel {
    //Das ist ein Array mit Valididierungsrichtlinien
    public $validate = array(
        'beschreibung' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>24)))
    );
}

?>