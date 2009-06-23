<?php


class Mehrwertsteuersatz extends AppModel {
    //Das ist ein Array mit Valididierungsrichtilinien
    //ist optional. Wenn nicht vorhanden, wird nicht
    //validiert
    public $displayField = 'beschreibung';
    public $validate = array(
		'beschreibung' => array('notEmpty' => array('rule'=>'notEmpty', 'message'=>'Dieses Feld ist ein Pflichtfeld'),'between' => array('rule' => array('between', 0, 50),'message'=>'Die Beschreibung darf maximal 50 Zeichen lang sein')),
    	'scale'=>array(
    		'numeric'=>array(
    			'rule'=>'numeric',
    			'required'=>true,
    			'message'=>'Scale darf nur Zahlen enthalten und muss 1-5 Ziffern enthalten',
    			'maxLength'=>5
    		),
    		'between' => array(
				'rule' => array('between', 1, 5),
    			'message'=>'Scale darf nur Zahlen enthalten und muss 1-5 Ziffern enthalten',
    		)
    	),
    	'satz'=>array(
    		'numeric'=>array(
    			'rule'=>'numeric',
    			'required'=>true,
    			'message'=>'Satz darf nur Zahlen enthalten und muss 1-5 Ziffern enthalten',
    			'maxLength'=>5
    		),
    		'between' => array(
				'rule' => array('between', 1, 5),
    			'message'=>'Satz darf nur Zahlen enthalten und muss 1-5 Ziffern enthalten',
    		)
    	)
    );
}

?>