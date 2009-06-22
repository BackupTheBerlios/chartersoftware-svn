<?php

/**
 *
 * @abstract Modell fuer Flugzeugtypen
 *
 * @author anbehren
 *
 */

class Flugzeugtyp extends AppModel {
	//Das ist ein Array mit Valididierungsrichtilinien
	//ist optional. Wenn nicht vorhanden, wird nicht
	//validiert
    public $validate = array(
	'name' => array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 50),'message'=>'Der Name darf maximal 50 Zeichen lang sein')),
    'seats' => array(
    		'numeric'=>array(
    			'rule'=>'numeric',
    			'required'=>true,
    			'message'=>'Das Feld darf nur Zahlen enthalten',
    			'maxLength'=>2
    		)
    	),
    'crewPersonal' => array(
    		'numeric'=>array(
    			'rule'=>'numeric',
    			'required'=>true,
    			'message'=>'Das Feld darf nur Zahlen enthalten',
    			'maxLength'=>2
    		)
    	),
    'cabinPersonal' => array(
    		'numeric'=>array(
    			'rule'=>'numeric',
    			'required'=>true,
    			'message'=>'Das Feld darf nur Zahlen enthalten',
    			'maxLength'=>2
    		)
    	)
    );
    public $displayField = 'name';

	//Datenbank-Assoziationen
    public $hasMany = array('Flugzeug');
    public $belongsTo = array('Flugzeughersteller' => array(
        'className'    => 'Flugzeughersteller',
        'foreignKey'    => 'flugzeughersteller_id'));
}

?>