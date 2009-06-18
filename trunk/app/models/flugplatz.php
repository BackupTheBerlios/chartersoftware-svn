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
        'name'=>array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 49),'message'=>'Der Text ist zu lang')),
        'iata'=>array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 9),'message'=>'Der Text ist zu lang')),
        'geoPosition'=>array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 34),'message'=>'Der Text ist zu lang')),
    );
}

?>