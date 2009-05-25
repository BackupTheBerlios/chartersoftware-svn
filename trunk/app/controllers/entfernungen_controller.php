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
    
    
    /**
     * 
     * param $x = Angabe einer geografischen Position im Format 7° 25' N, 10° 59' O
     * wird umgerechnet zu Bogenmaß als Array der Form
     * array('lat','long'}
     * wobei lat und long Floats sind. 
     */
    public function GeografischeGradzuBogenmass($x)
    {
    	//Aufräumen des Ursprungstrings
    	$x = str_replace('\'',' ',$x);
    	$x = str_replace('°',' ',$x);
    	$x = str_replace('"',' ',$x);
    	$x = str_replace(',',' ',$x);
    	
    	//zerlegen in Token Umrechnung und Umrechnung in Grad
    	$step = 0;
    	$lat = 0;
    	$lng = 0;
    	$liste = explode(' ',$x);
    	foreach ($liste as $token):
   			$token = ltrim(rtrim($token));
   			if (strlen($token)>0){
    			switch($step){
    				//Lat
					case 0: if (is_numeric($token)){$lat = (int)$token; $step++; break;}
					case 1: if (is_numeric($token)){$lat += (int)$token/60; $step++; break;}
					case 2: if (is_numeric($token)){$lat += (int)$token/3600; $step++; break;}		
					case 3: if (strtoupper($token) == 'S' ){$lat = $lat * -1;} $step = 4; break;
					    
					//Long				
					case 4: if (is_numeric($token)){$lng = (int)$token; $step++; break;}
					case 5: if (is_numeric($token)){$lng += (int)$token/60; $step++; break;}
					case 6: if (is_numeric($token)){$lng += (int)$token/3600; $step++; break;}		
					case 7: if (strtoupper($token) == 'W' ){$lng = $lng * -1;} $step = 9; break;

					default: break;   				
    			}
   			}
    	endforeach;
    	return array($lat*pi()/180, $lng*pi()/180);
    }


	/**
	 * 
	 * Test der Berechnung mit http://www.koordinaten.de/cgi-ko/koordinaten_entfernung.cgi
	 */
    public function CalcKugelDistanz($start, $ziel){
    	$lat1 = $start[0];
    	$lat2 = $ziel[0];
    	$long1 = $start[1];
    	$long2 = $ziel[1];
    	
 		$km = acos(sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($long1- $long2) ) * 6378;
 		return round($km);
    }

    
    /**
     * start: ID des StartFlugplatzes
     * ziel: ID des Zielflugplatzes
     */
    public function CalcEntfernung($start, $ziel)
    {
    	$this->Flugplatz->id=$start;
    	$startFlugplatz = $this->Flugplatz->field('geoPosition');
    	$bmStart = $this->GeografischeGradzuBogenmass($startFlugplatz);
    	
    	$this->Flugplatz->id=$ziel;
    	$zielFlugplatz = $this->Flugplatz->field('geoPosition');
    	$bmZiel = $this->GeografischeGradzuBogenmass($zielFlugplatz);
    	
    	return $this->CalcKugelDistanz($bmZiel,$bmStart);
    }
}
?>
