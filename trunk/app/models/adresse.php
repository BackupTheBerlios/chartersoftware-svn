<?php

/**
 *
 * @abstract Modell fuer Adressen
 *
 * @author anbehren
 *
 */

class Adresse extends AppModel {
    public $displayField = 'firma';
    //Das ist ein Array mit Valididierungsrichtlinien
    public $validate = array(
    	'plz'=>array(
    		'numeric'=>array(
    			'rule'=>'numeric',
    			'required'=>true,
    			'message'=>'PLZ darf nur Zahlen enthalten und muss genau 5 Ziffern enthalten',
    			'maxLength'=>5
    		),
    		'between' => array(
				'rule' => array('between', 5, 5),
    			'message'=>'PLZ darf nur Zahlen enthalten und muss genau 5 Ziffern enthalten'
    		)
    	),

    	'firma'=>array('between' => array('rule' => array('between', 0, 50),'message'=>'Der Firmenname darf maximal 50 Zeichen lang sein')),
    	'abteilung'=>array('between' => array('rule' => array('between', 0, 50),'message'=>'Der Abteilungsname darf maximal 50 Zeichen lang sein')),
    	'ansprechpartner'=>array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 50),'message'=>'Der Straßenname darf maximal 50 Zeichen lang sein')),
    	'strasse'=>array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 50),'message'=>'Der Straßenname darf maximal 50 Zeichen lang sein')),
    	'ort'=>array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 50),'message'=>'Der Ortsname darf maximal 50 Zeichen lang sein'))
    ); 
}

?>