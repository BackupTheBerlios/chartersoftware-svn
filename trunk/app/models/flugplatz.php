<?php

/**
 * 
 * @abstract Modell fuer Flugzeugtypen
 * 
 * @author anbehren 
 * 
 */

class Flugplatz extends AppModel {
    //Das ist der Name des Modells
    //wird als Instanzvariable bei Datenzugriffen
    //benutzt
    var $name = 'Flugplatz';


    //Das ist ein Array mit Valididierungsrichtilinien
    //ist optional. Wenn nicht vorhanden, wird nicht
    //validiert
    var $validate = array(
        'name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49))),
        'internatKuerzel' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>4))),
        'geoLokation' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>14)))
    );

    //Datenbank-Assoziationen
    var $belongsTo = array('Zeitzone');
}
                          
?>