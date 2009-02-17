<?php

class Zeitzone extends AppModel {
    var $name = 'Zeitzone';

	//TODO: Validierung sinnvoller machen, Zeitdifferenz muss sein -23<=x<=23
    var $validate = array('name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>29))),
                          'differenzUtc' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>3)))
                          );
}

?>