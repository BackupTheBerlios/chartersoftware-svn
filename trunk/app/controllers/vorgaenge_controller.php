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

		$this->set('zeitcharter', array('0'=>'Ja', '1'=>'Nein'));
	}


	public function view($id){
		if ($id != null)
        {
			$currentObject =& ClassRegistry::getObject($this->modelClass);
        	$currentObject->id = $id;
        	$this->data=$currentObject->read();
        	$this->data['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($this->data['Vorgang']);
        	
        }
		
	}


    public function berechnen($entfernung=null, $landungen= null, $flugzeug=null, $begleiter=null){
    	//Sammeln von Standarddaten (Liste von Flugzeugtypen und so)
		$this->setDefaultData();
		
		//Parameter und $this->data (von Webrequesten) zusammenführen
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
		
		//Eigentliche Berechnung, Ablage in lokalen Variablen
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
		$mwstSatz = $this->Kalkulationen->GetMwstSatz();
		$mwstZielflug = $kostenZielflug * $mwstSatz / 10000;
		$mwstZeitflug = $kostenZeitflug * $mwstSatz / 10000;
		$bruttoZielflug = $mwstZielflug + $kostenZielflug;
		$bruttoZeitflug = $mwstZeitflug + $kostenZeitflug;
		
		//Aufbereitung der lokalen Daten für Ausgabe in View
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
		$this->data['Vorgang']['mwstsatz'] = $mwstSatz;
		$this->data['Vorgang']['mwstZielflug'] = $mwstZielflug;
		$this->data['Vorgang']['mwstZeitflug'] = $mwstZeitflug;
		$this->data['Vorgang']['bruttoZielflug'] = $bruttoZielflug;
		$this->data['Vorgang']['bruttoZeitflug'] = $bruttoZeitflug;
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
    public function edit($vorgangstyp, $id=null)
	{	
		$this->pageTitle = 'Angebot erstellen';
		$this->set('vorgangstyp',$vorgangstyp);

		$currentObject =& ClassRegistry::getObject($this->modelClass);
		if (!empty($this->data))
		{
        	if (!$currentObject->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
	       		$this->redirect(array('action' => 'index'));
		}
      	else
      	{
      		$currentObject->id = $id;
        	$this->data = $currentObject->read();
			$this->setDefaultData();
			$this->data['Vorgang']['datum']=date("d.m.Y",time()); //heutiges Datum
			$strecke =split('[;]', $this->data['Vorgang']['flugstrecke']);
			if ($strecke != null) $this->data['Vorgang']['zielflughafen']=array_pop($strecke); 
			if ($strecke != null) $this->data['Vorgang']['startflughafen']=array_shift($strecke);
      	}
		
	}

    public function add()
	{
		$this->pageTitle = 'Angebot erstellen';
		$this->setDefaultData();
		if (!empty($this->data))
		{
			//Standard-Daten setzen.
			$this->data['Vorgang']['vorgangstyp_id']=1; //Typ ist angebot
			$this->data['Vorgang']['datum']=date("d.m.Y",time()); //heutiges Datum
			$this->data['Vorgang']['zeitcharter']=1; //Typ ist angebot
			$this->data['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($this->data['Vorgang']);
			
			//Speichern des Angebots
			if (!$this->Vorgang->save($this->data)) {
				//echo "nicht gespeichert";
                $this->Session->setFlash('Fehler beim Speichern');
			} else {
				//echo "gespeichert";
				$this->redirect(array('action' => 'vorgaenge/1'));
			}
        }		
	}
	
	public function angebot($id = null){
		header('content-type: text/plain');
		$this->setDefaultData();
		var_dump($this->data);
		if ($id != null)
        {
        	$currentObject->id = $id;
        	$this->data=$this->Vorgang->read();
        }
	}

	public function vorgangwandeln($vorgangstyp=null){
		//Test auf Fehler
		if ($this->data == null && $vorgangstyp == null){
			$this->redirect('/');
			exit;
		}
		
		if ($vorgangstyp != null && $this->data == null){
			//Formular soll aufgerufen werden
			$this->setDefaultData();
			$this->data=$this->Vorgang->find('all');
			$this->set('vorgangstyp',$vorgangstyp);
		} else {
			//Formular wurde abgeschickt
			$this->set('vorgangstyp',$vorgangstyp);
			$this->Vorgang->id = $this->data['Vorgang']['RECORD'];
			$record = $this->Vorgang->read();
			$record['Vorgang']['vorgangstyp_id']=$vorgangstyp;
			
			//Vorgang ist gewandelt, nun wird die nächste Seite aufgerufen
			if (!$this->Vorgang->save($record)) {
                $this->Session->setFlash('Fehler beim Speichern');
			} else {
				$this->redirect(array('action' => 'vorgaenge/'.$vorgangstyp));
			}
		}
	}

	public function vorgaenge($vorgangstyp){
		$this->setDefaultData();
		$this->data=$this->Vorgang->find('all');
		$this->set('vorgangstyp',$vorgangstyp);
	}


	public function bezahlen($id){
		if ($id == null) $this->Session->setFlash('Fehlerhafter Aufruf der Funktion','index');
		if (!empty($this->data))
		{
        	if (!$this->Vorgang->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
	       		$this->redirect(array('action' => 'vorgaenge/3'));
		}
      	else
      	{
      		$this->Vorgang->id = $id;
        	$this->data = $this->Vorgang->Read();
			$this->setDefaultData();
      	}
	}
}
?>