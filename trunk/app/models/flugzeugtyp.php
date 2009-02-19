<?php

class Flugzeugtyp extends AppModel {
    var $name = 'Flugzeugtyp';

    var $validate = array('name' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>49))));
                          
    
}

?>