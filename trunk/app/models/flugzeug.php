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
    public $validate = array(
	'kennzeichen' => array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 50),'message'=>'Der Name darf maximal 50 Zeichen lang sein'))
	);
    public $displayField = 'kennzeichen';

	//public $hasOne = 'Flugzeugtyp'; 
	//Datenbank-Assoziationen
    public $belongsTo = array('Flugzeugtyp' => array(
        'className'    => 'Flugzeugtyp',
        'foreignKey'    => 'flugzeugtyp_id'));
}

?>