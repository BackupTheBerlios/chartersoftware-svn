<?php

/**
 *
 * @abstract Modell fuer Adressen
 *
 * @author anbehren
 *
 */

class Vorgang extends AppModel {
    //Das ist der Name des Modells
    //wird als Instanzvariable bei Datenzugriffen
    //benutzt
    public $name = 'Vorgang';

    public $belongsTo = array(
		'Vorgangstyp' => array('className'    => 'Vorgangstyp','foreignKey'    => 'vorgangstyp_id'),
    	'Adresse' => array('className'    => 'Adresse','foreignKey'    => 'adresse_id'),
    );

}

?>