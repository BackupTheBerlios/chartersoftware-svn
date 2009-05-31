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
		AppController::add();	
		if (!empty($this->data)) {
			var_dump($this->data);
			//$this->redirect('index');
			
			/*
			array(1) { ["Vorgang"]=>  
				array(12) { 
					["adresse_id"]=>  string(1) "4" 
					["zeitcharter"]=>  string(4) "nein" 
					["datepicker"]=>  string(0) "" 
					["datepicker2"]=>  string(0) "" 
					["startflughafen"]=>  string(1) "5" 
					["zielflughafen"]=>  string(1) "7" 
					["Zwischenstop"]=>  string(0) "" 
					["AnzahlPersonen"]=>  string(1) "2" 
					["Flugzeugtyp"]=>  string(1) "3" 
					["AnzahlFlugbegleiter"]=>  string(1) "2" 
					["Sonderwunsch"]=>  string(0) "" 
					["Aufpreis"]=>  string(0) "" } } 
			*/
			/*
			 * Direktflug 
			 array(1) { ["Vorgang"]=>  array(12) {
			  ["adresse_id"]=>  string(0) "" 
			  ["zeitcharter"]=>  string(4) "nein" 
			  ["datepicker"]=>  string(10) "04.06.2009" 
			  ["datepicker2"]=>  string(10) "11.06.2009" 
			  ["startflughafen"]=>  string(1) "5" 
			  ["zielflughafen"]=>  string(1) "6" 
			  ["Zwischenstop"]=>  string(0) "" 
			  ["AnzahlPersonen"]=>  string(2) "22" 
			  ["Flugzeugtyp"]=>  string(1) "2" 
			  ["AnzahlFlugbegleiter"]=>  string(1) "2" 
			  ["Sonderwunsch"]=>  string(0) "" 
			  ["Aufpreis"]=>  string(0) "" } }
			 */ 
		} else {
			$this->set('zeitcharter', array('ja'=>'Ja', 'nein'=>'Nein'));
			$this->set('Vorgangsnummer','Wird automatisch vergeben...');
			$this->set('adressenliste',$this->Adresse->find('list'));
			$this->set('flugplatzliste',$this->Flugplatz->find('list'));
			$this->set('flugzeugtypenliste',$this->Flugzeugtyp->find('list'));
			$this->Flugplatz->order = 'Flugplatz.name ASC';
		}
	}
}
?>