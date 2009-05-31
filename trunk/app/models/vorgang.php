<?php

/**
 *
 * @abstract Modell fuer Adressen
 *
 * @author anbehren
 *
 */

class Vorgang extends AppModel {
    public $belongsTo = array(
		'Vorgangstyp' => array('className'    => 'Vorgangstyp','foreignKey'    => 'vorgangstyp_id'),
    	'Adresse' => array('className'    => 'Adresse','foreignKey'    => 'adresse_id'),
    );

}

?>