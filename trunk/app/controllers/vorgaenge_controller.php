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
		$liste = $this->Flugzeugtyp->find('all');
		$flugzeugtypenListeKomplett = array();
		foreach ($liste as $entry){
			$typ = $entry['Flugzeugtyp'];
			$name = $typ['name'];
			$reichweite = $typ['reichweite'];
			$begleitung = $typ['cabinPersonal'];
			$personen = $typ['seats'];
			$name = $typ['name'];
			$flugzeugtypenListeKomplett[$typ['id']]="$name (Reichweite $reichweite, Begleitung $begleitung, Passagiere $personen)";
		}
		$this->set('flugzeugtypenListeKomplett', $flugzeugtypenListeKomplett );
		$this->set('flugzeugtypenliste',$this->Flugzeugtyp->find('list'));

		$this->set('zeitcharter', array('ja'=>'Ja', 'nein'=>'Nein'));
	}



    public function berechnen($entfernung=null, $landungen= null, $flugzeug=null, $begleiter=null){
		$this->setDefaultData();
		if ($entfernung!=null && $flugzeug!= null && $begleiter != null && $landungen!=null)
		{
			//Noch keine Daten ausgewählt
			$this->data['Vorgang']['entfernung'] = $entfernung;
			$this->data['Vorgang']['flugzeugtyp'] = $flugzeug;
			$this->data['Vorgang']['landungen'] = $landungen;
			$this->data['Vorgang']['AnzahlFlugbegleiter'] = $begleiter;
		}else{
			$entfernung = $this->data['Vorgang']['entfernung'];
			$flugzeug = $this->data['Vorgang']['flugzeugtyp'];
			$landungen = $this->data['Vorgang']['landungen'];
			$begleiter = $this->data['Vorgang']['AnzahlFlugbegleiter'];
		}
		
		
		$flugzeugtyp = $this->data['Vorgang']['flugzeugtyp'];
		$offiziere = $this->Kalkulationen->Piloten($flugzeugtyp);
		$vmax = $this->Kalkulationen->vMaxFlugzeug($flugzeugtyp);
		$minBegleiter = $this->Kalkulationen->minFlugbegleiter($flugzeugtyp);
		$istBegleiter = $this->Kalkulationen->istFlugbegleiter($flugzeugtyp, $this->data['Vorgang']['AnzahlFlugbegleiter'] );
		$flugzeit = $this->Kalkulationen->Flugzeit($entfernung, $vmax);
		$reisezeit = $this->Kalkulationen->Reisezeit($entfernung, $vmax, $landungen);
		$personalkosten = $this->Kalkulationen->PersonalKosten($offiziere, $istBegleiter, $reisezeit);
		$kostenZielflug = $this->Kalkulationen->KalkulationFlugkostenZielflug($flugzeugtyp, $entfernung, $landungen, $istBegleiter);
		$kostenZeitflug = $this->Kalkulationen->KalkulationFlugkostenZeitflug($flugzeugtyp, $entfernung, $landungen, $istBegleiter);
		$this->data['Vorgang']['entfernung'] = $entfernung;
		$this->data['Vorgang']['landungen'] = $landungen;
		$this->data['Vorgang']['vmax'] = $vmax;
		$this->data['Vorgang']['offiziere'] = $offiziere;
		$this->data['Vorgang']['minBegleiter'] = $minBegleiter;
		$this->data['Vorgang']['istBegleiter'] = $istBegleiter;
		$this->data['Vorgang']['flugzeit'] = $flugzeit;
		$this->data['Vorgang']['reisezeit'] = $reisezeit;
		$this->data['Vorgang']['personalkosten'] = $personalkosten;
		$this->data['Vorgang']['kostenZielflug'] = $kostenZielflug;
		$this->data['Vorgang']['kostenZeitflug'] = $kostenZeitflug;
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