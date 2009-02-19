<?php

class Flugzeughersteller extends AppModel {
    var $name = 'Flugzeughersteller';

    var $validate = array('name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49))));
                          
    
}

?>