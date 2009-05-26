<?php

/**
 *
 * @abstract Modell fuer Flugzeugtypen
 *
 * @author anbehren
 *
 */

class Flugzeugtyp extends AppModel {
	//Das ist der Name des Modells
	//wird als Instanzvariable bei Datenzugriffen
	//benutzt
    public $name = 'Flugzeugtyp';
    public $hersteller = 'Flugzeughersteller';


	//Das ist ein Array mit Valididierungsrichtilinien
	//ist optional. Wenn nicht vorhanden, wird nicht
	//validiert
    public $validate = array(
	'name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49))),
    'seats' => VALID_NOT_EMPTY,
    'crewPersonal' => VALID_NOT_EMPTY,
    'cabinPersonal' =>VALID_NOT_EMPTY
    );

	//Datenbank-Assoziationen
    //var $hasMany = array('Flugzeug');
    public $belongsTo = array('Flugzeughersteller' => array(
        'className'    => 'Flugzeughersteller',
        'foreignKey'    => 'flugzeughersteller_id'));
}

?>