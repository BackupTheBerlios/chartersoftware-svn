<?php

/**
 *
 * @abstract Modell fuer Adressen
 *
 * @author anbehren
 *
 */

class Vorgang extends AppModel {
	var $actsAs = array('DateFormatter');
    public $belongsTo = array(
		'Vorgangstyp' => array('className'    => 'Vorgangstyp','foreignKey'    => 'vorgangstyp_id'),
    	'Adresse' => array('className'    => 'Adresse','foreignKey'    => 'adresse_id'),
    );


    public $validate = array(
		'adresse_id' => VALID_NOT_EMPTY,
        'datepicker' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>2))),
        'datepicker2' => array('required'=>VALID_NOT_EMPTY, 'length'=>array('rule'=>array("maxLength"=>2))),
        'flugzeugtyp_id' => VALID_NOT_EMPTY
    );

    public $validate2 = array(
		'adresse_id' => VALID_NOT_EMPTY,
    	'datepicker' => VALID_NOT_EMPTY,
    	'datepicker2' => VALID_NOT_EMPTY,
    	'startflughafen' =>VALID_NOT_EMPTY
    );

}

?>