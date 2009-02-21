<?php

class Zeitzone extends AppModel {
    var $name = 'Zeitzone';

	//TODO: Validierung sinnvoller machen, Zeitdifferenz muss sein -11<=x<=11
    var $validate = array('name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>29))),
                          'differenzUtc' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>3)))
                          );

    //Datenbank-Assoziationen
    var $hasMany = array('Flugplatz');

}

?>