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
    public $uses = array('Vorgang','Adresse','Flugplatz','Flugzeugtyp');


	public function drucken(){
		
	}

	/**Anzeigen einer Liste*/
    public function edit($id=null)
	{
		AppController::edit($id);	
		$this->set('adressenliste',$this->Adresse->find('list'));
		$this->set('flugplatzliste',$this->Flugplatz->find('list'));
		$this->set('Flugzeugtypen',$this->Flugzeugtyp->find('list'));
		$this->Flugplatz->order = 'Flugplatz.name ASC';
	}

    public function add()
	{
		//AppController::add();	
		if (!empty($this->data)) {
			var_dump($this->data);
		} else {
			$this->set('zeitcharter', array('ja'=>'Ja', 'nein'=>'Nein'));
	        //Neu Anlegen eines Angebots
			$this->set('Vorgangsnummer','Wird automatisch vergeben...');
			$this->set('adressenliste',$this->Adresse->find('list'));
			$this->set('flugplatzliste',$this->Flugplatz->find('list'));
			$this->set('flugzeugtypenliste',$this->Flugzeugtyp->find('list'));
			$this->Flugplatz->order = 'Flugplatz.name ASC';
		}
	}
}
?>