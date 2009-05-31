<?php

/**
 *
 * @abstract Modell fuer Adressen
 *
 * @author anbehren
 *
 */

class Adresse extends AppModel {
    //Das ist ein Array mit Valididierungsrichtlinien
    public $validate = array(
        'firma' => array('length'=>array('rule'=>array("maxLength"=>49))),
        'abteilung' => array('length'=>array('rule'=>array("maxLength"=>49))),
        'ansprechpartner' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49))),
        'strasse' => array('length'=>array('required'=>VALID_NOT_EMPTY, 'rule'=>array("maxLength"=>49))),
        'plz' => array('length'=>array('required'=>VALID_NOT_EMPTY, 'rule'=>array("maxLength"=>49))),
        'ort' => array('length'=>array('required'=>VALID_NOT_EMPTY, 'rule'=>array("maxLength"=>49)))
    );
}

?>