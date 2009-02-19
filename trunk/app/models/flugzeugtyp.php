<?php

class FlugzeugTyp extends AppModel {
    var $name = 'FlugzeugTyp';

    var $validate = array('name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49))));
                          
    
}

?>