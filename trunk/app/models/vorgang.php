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
    	'Vorgangstyp' => array('className'    => 'Vorgangstyp','foreignKey'    => 'vorgangstyp_id'),
    	'Zufriedenheitstyp' => array('className'    => 'Zufriedenheitstyp','foreignKey'    => 'zufriedenheitstyp_id'),
    );


    public $validate = array(
		'adresse_id' => VALID_NOT_EMPTY,
        //'vonDatum' => VALID_NOT_EMPTY,
        //'bisDatum' => VALID_NOT_EMPTY,
        'flugzeugtyp_id' => VALID_NOT_EMPTY,
        'AnzahlPersonen' => VALID_NOT_EMPTY,
        'AnzahlFlugbegleiter' => VALID_NOT_EMPTY,
        'zeitcharter' => VALID_NOT_EMPTY
    );
}

?>