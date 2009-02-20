<?php

class Flugzeughersteller extends AppModel {
	//Das ist der Name des Modells
	//wird als Instanzvariable bei Datenzugriffen
	//benutzt
    var $name = 'Flugzeughersteller';

	//Das ist ein Array mit Valididierungsrichtilinien
	//ist optional. Wenn nicht vorhanden, wird nicht
	//validiert
    var $validate = array('name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49))));
	
	//Datenbank-Assoziationen
	var $hasMany = array('Flugzeugtyp');
}

?>