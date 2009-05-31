<?php

class Flugzeughersteller extends AppModel {
	//Das ist der Name des Modells
	//wird als Instanzvariable bei Datenzugriffen
	//benutzt
    public $name = 'Flugzeughersteller';
    public $displayField = 'name';

	//Das ist ein Array mit Valididierungsrichtilinien
	//ist optional. Wenn nicht vorhanden, wird nicht
	//validiert
    public $validate = array('name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49))));

	//Datenbank-Assoziationen
	public $hasMany = array('Flugzeugtyp');
}

?>