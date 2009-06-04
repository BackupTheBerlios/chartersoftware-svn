<?php
/*
 * Created on 25.05.2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
class KalkulationenComponent extends Object {

	private function getData($id, $modell){
		$Modell =& ClassRegistry::getObject($modell);
    	$Modell->id=$id;
    	return $Modell->Read();
	}

	private function getFlugplatz($id){
		return $this->getData($id, 'Flugplatz');
	}

	private function getFlugzeugtyp($id){
		return $this->getData($id, 'Flugzeugtyp');
	}

	private function getAdresse($id){
		return $this->getData($id, 'Adresse');
	}

	private function GetMwstSatz($id){
		return 1900;
	}

	
	private function floatToTime($time){
		$time = abs($time) * 60;
		if ($time <= 60) {
			return  sprintf('%02d:%02d:00',0, $time);
		}

		$time=intval($time);
		$h = intval($time / 60);
		$m = $time - ($h*60);
		
		return sprintf('%02d:%02d:00',$h, $m);
	}

	private function calcStrecke($strecke, $flugzeugtyp){
		$result = array();
		$teile = split('[;]', $strecke);
		$result['landungen']=count($teile)-1;
		
		//Start- und Landeflugplatz
		if (count($teile)>0){
			$result['startflugplatz']=$this->getFlugplatz($teile[0]);
			$result['zielflugplatz']=$this->getFlugplatz($teile[count($teile)-1]);
		}
		$teilstrecken=array();
		$gesamtstrecke = 0;
		$gesamtflugzeit = 0;
		$gesamtreisezeit = 0;
		for($i = 0; $i<count($teile)-1;$i++){
			$teil = array();
			$teil['entfernung']= $this->CalcEntfernung($teile[$i],$teile[$i+1]);
			$teil['flugzeit']= $this->calcFlugzeit($teil['entfernung'], $this->vMaxFlugzeug($flugzeugtyp) );
			$teil['reisezeit']= $this->calcReisezeit($teil['entfernung'],$this->vMaxFlugzeug($flugzeugtyp) ,1);
			$teil['flugzeitStr']=$this->floatToTime($teil['flugzeit']);
			$teil['reisezeitStr']=$this->floatToTime($teil['reisezeit']);
			$teil['von']= $this->getFlugplatz($teile[$i]);
			$teil['nach']= $this->getFlugplatz($teile[$i+1]);
			$gesamtstrecke+=$teil['entfernung'];
			$gesamtreisezeit+=$teil['reisezeit'];
			$gesamtflugzeit+=$teil['flugzeit'];
			$teilstrecken[]=$teil;
		}
		$result['gesamtstrecke']=$gesamtstrecke;
		$result['gesamtreisezeit']=$gesamtreisezeit;
		$result['gesamtflugzeit']=$gesamtflugzeit;
		$result['gesamtreisezeitStr']=$this->floatToTime($gesamtreisezeit);
		$result['gesamtflugzeitStr']=$this->floatToTime($gesamtflugzeit);
		$result['flugstrecke']=$teilstrecken;
		
		return $result;
	}


	public function KalkuliereVorgang($vorgang){
		$result = $vorgang;
		$result['Adresse']=$this->getAdresse($vorgang['adresse_id']);
		$result['Flugstrecke']=$this->calcStrecke($vorgang['flugstrecke'], $vorgang['flugzeugtyp_id']);
		$result['Flugzeug']=$this->getFlugzeugtyp($vorgang['flugzeugtyp_id']);
		if ($vorgang['zeitcharter']==1){
			$result['Kalkulation']=$this->KalkulationFlugkostenZielflug($result);
		} else {
			$result['Kalkulation']=$this->KalkulationFlugkostenZeitflug($result);
		}
		$result['netto']=$result['Kalkulation']['gesamtnetto'];
		$result['mwst']=$result['Kalkulation']['mwst'];
		$result['brutto_soll']=$result['Kalkulation']['gesamtbrutto'];

		return $result;
	} 


	
	public function KalkulationFlugkostenZielflug($vorgang){
		$result = array();
		$flugzeugtyp =$vorgang['flugzeugtyp_id']; 
		
		//Personalkosten
		$begleiter = $this->istFlugbegleiter($flugzeugtyp, $vorgang['AnzahlFlugbegleiter']);
		$crew = $vorgang['Flugzeug']['Flugzeugtyp']['crewPersonal'];
		$reisezeit = $vorgang['Flugstrecke']['gesamtreisezeit'];
		$personalkosten = $this->PersonalKosten($crew, $begleiter, $reisezeit);
		
		//Flugzeugkosten
		$flugzeugkostenStunde = $this->FlugzeugkostenStunde($flugzeugtyp);
		$flugzeugkostenZeit = $this->FlugzeugkostenZeit($flugzeugtyp, $reisezeit);

		//Sonderwünsche
		$sonderwünsche = $vorgang['sonderwunsch_netto'];
		
		//Gesamtkosten
		$gesamtnetto = $flugzeugkostenZeit + $personalkosten + $sonderwünsche;
		$mwstsatz = 1900 ;
		$mwst = round($gesamtnetto * $mwstsatz/10000,2);
		$gesamtbrutto = $gesamtnetto + $mwst;

		
		//Ergebnis zusammen bauen
		$result['personalkosten']=$personalkosten;
		$result['flugzeugkosten']=$flugzeugkostenZeit;
		$result['gesamtnetto']=$gesamtnetto;
		$result['mwstsatz']=$mwstsatz;
		$result['mwst']=$mwst;
		$result['gesamtbrutto']=$gesamtbrutto;
		return $result;		
	}

	public function KalkulationFlugkostenZeitflug($vorgang){
		$result = array();
		$flugzeugtyp =$vorgang['flugzeugtyp_id']; 
		
		//Personalkosten
		$begleiter = $this->istFlugbegleiter($flugzeugtyp, $vorgang['AnzahlFlugbegleiter']);
		$crew = $vorgang['Flugzeug']['Flugzeugtyp']['crewPersonal'];
		$reisezeit = 1;
		$personalkosten = $this->PersonalKosten($crew, $begleiter, $reisezeit);
		
		//Flugzeugkosten
		$flugzeugkostenStunde = $this->FlugzeugkostenStunde($flugzeugtyp);
		$flugzeugkostenZeit = $this->FlugzeugkostenZeit($flugzeugtyp, $reisezeit);
		
		//Sonderwünsche
		$sonderwünsche = $vorgang['sonderwunsch_netto'];
		
		//Gesamtkosten
		$gesamtnetto = $flugzeugkostenZeit + $personalkosten + $sonderwünsche;
		$mwstsatz = 1900 ;
		$mwst = round($gesamtnetto * $mwstsatz/10000,2);
		$gesamtbrutto = $gesamtnetto + $mwst;

		
		//Ergebnis zusammen bauen
		$result['personalkosten']=$personalkosten;
		$result['flugzeugkosten']=$flugzeugkostenZeit;
		$result['gesamtnetto']=$gesamtnetto;
		$result['mwstsatz']=$mwstsatz;
		$result['mwst']=$mwst;
		$result['gesamtbrutto']=$gesamtbrutto;
		return $result;		
	}
	
	public function vMaxFlugzeug($flugzeugtyp){
		$daten = $this->getFlugzeugtyp($flugzeugtyp);
		return $daten['Flugzeugtyp']['vmax'];	
	}
	
	
	public function CalcReisezeit($entfernung, $geschwindigkeit, $landungen){
		return $entfernung / $geschwindigkeit + $landungen *0.75;
	}
	
	public function CalcFlugzeit($entfernung, $geschwindigkeit){
		return $entfernung / $geschwindigkeit;
	}

	public function minFlugbegleiter($flugzeugtyp){
		$daten = $this->getFlugzeugtyp($flugzeugtyp);
		return $daten['Flugzeugtyp']['cabinPersonal'];	
	}

	public function istFlugbegleiter($flugzeugtyp, $istBegleiter){
		$result = 0;
		if ($istBegleiter == null) $istBegleiter =0;
		$min = $this->minFlugbegleiter($flugzeugtyp);
		if ($istBegleiter > $min) return $istBegleiter;
		return $min;
	}

	public function FlugzeugkostenStunde($flugzeugtyp){
		$result = 0;
		$daten = $this->getFlugzeugtyp($flugzeugtyp);
		$grundkosten = $daten['Flugzeugtyp']['jahreskosten']/2000;
		$stundenkosten = $daten['Flugzeugtyp']['stundenkosten'];
		return round(($grundkosten + $stundenkosten)*1.2,2);
	}
	
	public function FlugzeugkostenZeit($flugzeugtyp, $reisezeit){
		return round($this->FlugzeugkostenStunde($flugzeugtyp)*$reisezeit, 2);
	}

	public function PersonalKosten($crew, $begleitung, $flugdauer){
		$dauer = round($flugdauer);
		if ($dauer < $flugdauer ) $dauer += +1;
		return round(1.2 * (43000 + ($crew - 1)*30000 + $begleitung*23000)/2000*($dauer),2);
	}

	public function Piloten($flugzeugtyp){
		$flugzeugTypModell =& ClassRegistry::getObject('Flugzeugtyp');
		$flugzeugTypModell->id = $flugzeugtyp;
		$daten = $flugzeugTypModell->Read();
		return $daten['Flugzeugtyp']['crewPersonal'];	
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
     * start: ID des StartFlugplatzes
     * ziel: ID des Zielflugplatzes
     */
    public function CalcEntfernung($start, $ziel)
    {
		$Modell =& ClassRegistry::getObject('Flugplatz');
    	$Modell->id=$start;
    	$startFlugplatz = $Modell->field('geoPosition');
    	$bmStart = $this->GeografischeGradzuBogenmass($startFlugplatz);
    	
    	$Modell->id=$ziel;
    	$zielFlugplatz = $Modell->field('geoPosition');
    	$bmZiel = $this->GeografischeGradzuBogenmass($zielFlugplatz);
    	
    	return $this->CalcKugelDistanz($bmZiel,$bmStart);
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
