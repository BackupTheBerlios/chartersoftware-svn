<?php

/**
 *
 * @abstract Modell fuer Adressen
 *
 * @author anbehren
 *
 */

class Report extends AppModel {
    //Das ist ein Array mit Valididierungsrichtlinien
    public $displayField = 'name';
    public $validate = array(
        'name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49)))
    );
}

?>