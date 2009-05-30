<?php

/**
 * Controller für
 *
 * @author A. Behrens
 *
 *
 * Grundprinzip: Jede Methode ist eine Action und kann von au�en aufgerufen
 * werden. Etwa "/cake/index.php/flugplatzs/edit".
 *
 * Dabei kann es sein, dass ein Parameter �bergeben wird oder auch nicht.
 *
 */
class VorgaengeController extends AppController
{
	public $name = 'Vorgang';
    public $uses = array('Vorgang','Adresse','Flugplatz','Flugzeugtyp');

    public function index()
	{
		$this->data=$this->Vorgang->find('all');
	}


	/**Anzeigen einer Liste*/
    public function add()
	{
		AppController::add();	
        
        //Neu Anlegen eines Angebots
		$this->set('Vorgangsnummer','Wird automatisch vergeben...');
		$this->set('Adressen',$this->Adresse->find('all'));
		$this->set('Flugzeugtypen',$this->Flugzeugtyp->find('all'));
		$this->Flugplatz->order = 'Flugplatz.name ASC';
		$this->set('Flugplaetze',$this->Flugplatz->find('all'));
	}
}
?>