<?php

/**
 *
 * @abstract Modell fuer Flugzeug
 *
 * @author anbehren
 *
 */

class Flugzeug extends AppModel {
	//Das ist ein Array mit Valididierungsrichtilinien
	//ist optional. Wenn nicht vorhanden, wird nicht
	//validiert
    public $validate = array('kennzeichen' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>14))));

	//public $hasOne = 'Flugzeugtyp'; 
	//Datenbank-Assoziationen
    public $belongsTo = array('Flugzeugtyp' => array(
        'className'    => 'Flugzeugtyp',
        'foreignKey'    => 'flugzeugtyp_id'));
}

?>