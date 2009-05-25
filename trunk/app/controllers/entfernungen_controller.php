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
    public $name = 'Entfernung';

    /**Anzeigen einer Liste*/
    public function index()
    {
		$this->Flugplatz->order = 'Flugplatz.name ASC';
		$this->set('Flugplaetze',$this->Flugplatz->find('list'));
		$this->set('Entfernung',0);
		$this->set('zeitzonenliste', timezone_identifiers_list());

		if (empty($this->data))
		{
			//Noch keine Daten ausgewählt
		}else{
			//bereits Daten ausgewählt
			$start_id = $this->data[Entfernung][start_id];
			$ziel_id = $this->data[Entfernung][ziel_id];
			$this->set('Entfernung',$this->CalcEntfernung($start_id, $ziel_id));
		}
    }
    
    
    public function Bogenmass($x)
    {
    	echo $x;
    	return (($x * pi)/180);    	
    }
    
    /**
     * start: ID des StartFlugplatzes
     * ziel: ID des Zielflugplatzes
     */
    public function CalcEntfernung($start, $ziel)
    {
    	$this->Flugplatz->id=$start;
    	$startFlugplatz = $this->Flugplatz->field('geoPosition');
    	$bmStart = $this->Bogenmass($startFlugplatz);
    	$this->Flugplatz->id=$ziel;
    	$zielFlugplatz = $this->Flugplatz->field('geoPosition');
    	
    	
    	srand((double)microtime()*1000000); 
		return rand(0,100);
    }
}
?>
