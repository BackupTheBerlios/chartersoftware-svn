<?php

/**
 * Controller für Zeitzonen
 *
 * @author A. Behrens
 *
 *
 * Grundprinzip: Jede Methode ist eine Action und kann von au�en aufgerufen
 * werden. Etwa "/cake/index.php/flugzeugherstellers/edit".
 *
 * Dabei kann es sein, dass ein Parameter �bergeben wird oder auch nicht.
 *
 */
class PreistestsController extends AppController
{
    public $uses = array('Flugplatz', 'Flugzeug');
	
    public function index($start =0, $ziel=0){
		$this->Flugplatz->order = 'Flugplatz.name ASC';
		$this->set('Flugplaetze',$this->Flugplatz->find('list'));
		$this->set('zeitzonenliste', timezone_identifiers_list());
		
		if ($start!=null && $ziel != null)
		{
			//Noch keine Daten ausgewählt
			$this->data['Entfernung']['start_id'] = $start;
			$this->data['Entfernung']['ziel_id'] = $ziel;
		}else{
			//bereits Daten ausgewählt
			$start = $this->data['Entfernung']['start_id'];
			$ziel = $this->data['Entfernung']['ziel_id'];
		}
		$this->data['Entfernung']['distance'] = $this->CalcEntfernung($start, $ziel);
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
	
}
?>