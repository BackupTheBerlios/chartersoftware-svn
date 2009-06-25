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
    public $validate = array(
		'name' => array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 50),'message'=>'Der Name darf maximal 50 Zeichen lang sein')),
	);

	//Datenbank-Assoziationen
	public $hasMany = array('Flugzeugtyp');
}

?>