<?php
/*
 * Created on 25.05.2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
class KalkulationenComponent extends Object {
	
	
	public function vMaxFlugzeug($flugzeugtyp){
		$flugzeugTypModell =& ClassRegistry::getObject('Flugzeugtyp');
		$flugzeugTypModell->id = $flugzeugtyp;
		$daten = $flugzeugTypModell->Read();
		return $daten['Flugzeugtyp']['vmax'];	
	}
	
	public function Flugzeit($entfernung, $geschwindigkeit){
		return $entfernung / $geschwindigkeit;
	}

	public function minFlugbegleiter($flugzeugtyp){
		$flugzeugTypModell =& ClassRegistry::getObject('Flugzeugtyp');
		$flugzeugTypModell->id = $flugzeugtyp;
		$daten = $flugzeugTypModell->Read();
		return $daten['Flugzeugtyp']['cabinPersonal'];	
	}

	public function istFlugbegleiter($flugzeugtyp, $istBegleiter){
		$result = 0;
		if ($istBegleiter == null) $istBegleiter =0;
		$min = $this->minFlugbegleiter($flugzeugtyp);
		if ($istBegleiter > $min) return $istBegleiter;
		return $min;
	}

	public function PersonalKosten($crew, $begleitung, $flugdauer){
		$dauer = round($flugdauer);
		if ($dauer < $flugdauer ) $dauer += +1;
		return 1.2 * (43000 + ($crew - 1)*30000 + $begleitung*23000)/2000*($dauer);
	}

	public function Piloten($flugzeugtyp){
		$flugzeugTypModell =& ClassRegistry::getObject('Flugzeugtyp');
		$flugzeugTypModell->id = $flugzeugtyp;
		$daten = $flugzeugTypModell->Read();
		return $daten['Flugzeugtyp']['crewPersonal'];	
	}

	public function Reisezeit($entfernung, $geschwindigkeit, $landungen){
		return $entfernung / $geschwindigkeit + $landungen *0.75;
	}
	
	public function PreisKalkulation($flugzeugtyp)
	{
		$zwischenstopps = 0;
		$entfernung = 0;
		$flugzeugjahreskosten = 0;
		$flugzeugstundenkosten = 0;
		$flugzeugTypModell =& ClassRegistry::getObject('Flugzeugtyp');
		$flugzeugTypModell->id = $flugzeugtyp;
		var_dump($flugzeugTypModell->Read());
		
		
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
	
}
 
?>
