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
    public $displayField = 'beschreibung';
    public $validate = array(
       'beschreibung' => array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 50),'message'=>'Die Beschreibung darf maximal 50 Zeichen lang sein')),
        
    );
}

?>