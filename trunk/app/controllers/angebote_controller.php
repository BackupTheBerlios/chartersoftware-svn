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
class AngeboteController extends AppController
{
	public $name = 'Angebot';
    public $uses = array('Adresse','Flugplatz');

	/**Anzeigen einer Liste*/
    public function index()
	{
	}

	/**Anzeigen einer Liste*/
    public function add()
	{
		AppController::add();	
        
        //Neu Anlegen eines Angebots
		$this->set('Vorgangsnummer','Wird automatisch vergeben...');
		$this->set('Adressen',$this->Adresse->find('all'));
		$this->Flugplatz->order = 'Flugplatz.name ASC';
		$this->set('Flugplaetze',$this->Flugplatz->find('all'));
	}
}
?>