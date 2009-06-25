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
       'name' => array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 50),'message'=>'Der Name darf maximal 50 Zeichen lang sein')),
    );
}

?>