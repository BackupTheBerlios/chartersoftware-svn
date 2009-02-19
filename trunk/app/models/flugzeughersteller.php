<?php

class FlugzeugHersteller extends AppModel {
    var $name = 'FlugzeugHersteller';

    var $validate = array('name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49))));
                          
    
}

?>