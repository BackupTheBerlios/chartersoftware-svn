<?php

/**
 * 
 * @abstract Modell fuer Flugzeug
 * 
 * @author anbehren 
 * 
 */

class Flugzeug extends AppModel {
	//Das ist der Name des Modells
	//wird als Instanzvariable bei Datenzugriffen
	//benutzt
    var $name = 'Flugzeug';


	//Das ist ein Array mit Valididierungsrichtilinien
	//ist optional. Wenn nicht vorhanden, wird nicht
	//validiert
    var $validate = array('kennzeichen' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>14))));

	//Datenbank-Assoziationen
    var $belongsTo = array('Flugzeugtyp' => array(           
        'className'    => 'Flugzeugtyp',            
        'foreignKey'    => 'flugzeugtyp_id'));      
}
                          
?>