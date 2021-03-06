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
class EntfernungenController extends AppController
{
    public $uses = array('Flugplatz');

    public function berechnen($start =0, $ziel=0)
    {
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
		$this->data['Entfernung']['distance'] = $this->Kalkulationen->CalcEntfernung($start, $ziel);
		
		
    }    
    
}
?>
