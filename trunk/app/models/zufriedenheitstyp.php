<?php

/**
 *
 * @abstract Modell fuer Leistungstypen
 *
 * @author anbehren
 *
 */

class Zufriedenheitstyp extends AppModel {
    //Das ist ein Array mit Valididierungsrichtlinien
    public $displayField = 'beschreibung';
    public $validate = array(
        'beschreibung' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>24)))
    );
}

?>