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

	private function setDefaultData(){
		$this->Flugplatz->order = 'Flugplatz.name ASC';
		$this->Adresse->order = 'Adresse.firma ASC';
		$this->Flugzeugtyp->order = 'Flugzeugtyp.name ASC';

		$this->set('adressenliste',$this->Adresse->find('list'));
		$this->set('flugplatzliste',$this->Flugplatz->find('list'));
		$this->set('flugzeugtypenliste',$this->Flugzeugtyp->find('list'));

		$this->set('zeitcharter', array('ja'=>'Ja', 'nein'=>'Nein'));
	}

    public function berechnen($start=null, $ziel=null, $flugzeug=null, $begleiter=null){
		$this->setDefaultData();
		if ($start!=null && $ziel != null && $flugzeug != null)
		{
			//Noch keine Daten ausgewählt
			$this->data['Vorgang']['startflughafen'] = $start;
			$this->data['Vorgang']['zielflughafen'] = $ziel;
			$this->data['Vorgang']['flugzeugtyp'] = $flugzeug;
			$this->data['Vorgang']['AnzahlFlugbegleiter'] = $begleiter;
		}else{
			var_dump($this->data);
			//bereits Daten ausgewählt
			$start = $this->data['Vorgang']['startflughafen'];
			$ziel = $this->data['Vorgang']['zielflughafen'];
			$flugzeug = $this->data['Vorgang']['flugzeugtyp'];
			$begleiter = $this->data['Vorgang']['AnzahlFlugbegleiter'];
		}
		
		
		$flugzeugtyp = $this->data['Vorgang']['flugzeugtyp'];
		$entfernung = $this->CalcEntfernung($start, $ziel);
		$offiziere = $this->Kalkulationen->Piloten($flugzeugtyp);
		$vmax = $this->Kalkulationen->vMaxFlugzeug($flugzeugtyp);
		$minBegleiter = $this->Kalkulationen->minFlugbegleiter($flugzeugtyp);
		$istBegleiter = $this->Kalkulationen->istFlugbegleiter($flugzeugtyp, $this->data['Vorgang']['AnzahlFlugbegleiter'] );
		$flugzeit = $this->Kalkulationen->Flugzeit($entfernung, $vmax);
		$landungen = 1;
		$reisezeit = $this->Kalkulationen->Reisezeit($entfernung, $vmax, $landungen);
		$personalkosten = $this->Kalkulationen->PersonalKosten($offiziere, $istBegleiter, $reisezeit);
		
		
		$this->data['Vorgang']['entfernung'] = $entfernung;
		$this->data['Vorgang']['anzlandungen'] = 1;
		$this->data['Vorgang']['vmax'] = $vmax;
		$this->data['Vorgang']['offiziere'] = $offiziere;
		$this->data['Vorgang']['minBegleiter'] = $minBegleiter;
		$this->data['Vorgang']['istBegleiter'] = $istBegleiter;
		$this->data['Vorgang']['flugzeit'] = $flugzeit;
		$this->data['Vorgang']['reisezeit'] = $reisezeit;
		$this->data['Vorgang']['personalkosten'] = $personalkosten;
	}
	
    /**
     * start: ID des StartFlugplatzes
     * ziel: ID des Zielflugplatzes
     */
    public function CalcEntfernung($start, $ziel)
    {
    	$this->Flugplatz->id=$start;
    	$startFlugplatz = $this->Flugplatz->field('geoPosition');
    	$bmStart = $this->Kalkulationen->GeografischeGradzuBogenmass($startFlugplatz);
    	
    	$this->Flugplatz->id=$ziel;
    	$zielFlugplatz = $this->Flugplatz->field('geoPosition');
    	$bmZiel = $this->Kalkulationen->GeografischeGradzuBogenmass($zielFlugplatz);
    	
    	return $this->Kalkulationen->CalcKugelDistanz($bmZiel,$bmStart);
    }
    
    
    
	/**Anzeigen einer Liste*/
    public function edit($id=null)
	{
		AppController::edit($id);	
		$this->setDefaultData();
	}

    public function add()
	{
		AppController::add();	
		$this->setDefaultData();
		
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
		}
	}
}
?>