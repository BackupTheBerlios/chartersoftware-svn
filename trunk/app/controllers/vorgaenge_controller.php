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
    public $uses = array('Vorgang','Adresse','Flugplatz','Flugzeugtyp','Zufriedenheitstyp','Vorgangstyp');

	private function setDefaultData(){
		$this->Flugplatz->order = 'Flugplatz.name ASC';
		$this->Adresse->order = 'Adresse.firma ASC';
		$this->Flugzeugtyp->order = 'Flugzeugtyp.name ASC';
		$this->Zufriedenheitstyp->order = 'Zufriedenheitstyp.beschreibung ASC';

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
		$this->set('ablehnungsgrundliste',$this->Zufriedenheitstyp->find('list', array('conditions'=>array('istAblehnungsgrund'=>'1'))));
		$this->set('zufriedenheitsgrundliste',$this->Zufriedenheitstyp->find('list', array('conditions'=>array('istAblehnungsgrund'=>'0'))));

		$this->set('zeitcharter', array('1'=>'Ja', '0'=>'Nein'));
	}


    public function indexAngebote($alle=null)
	{
		//Liste von Vorgängen aufbauen
		if (empty($alle)){
			$this->data=$this->Vorgang->find('all', array('conditions'=>array('vorgangstyp_id'=>'1','zufriedenheitstyp_id'=>null)));
			$this->set('zeigtAlle','nein');
		}else{
			$this->data=$this->Vorgang->find('all', array('conditions'=>array('vorgangstyp_id'=>'1')));
			$this->set('zeigtAlle','ja');
		}

		//Alle Vorgänge um Kalkulationen anreichern
		for($count=0;$count<count($this->data);$count++){
			$vorgang= $this->data[$count];
			$vorgang['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($vorgang['Vorgang']);
			$this->data[$count]=$vorgang;
		}

		//Ein paar Default-Sachen übergeben
		$this->setDefaultData();
	}

	public function indexVertraege($alle=null){
		//Liste von Vorgängen aufbauen
		if (empty($alle)){
			$this->data=$this->Vorgang->find('all', array('conditions'=>array('vorgangstyp_id'=>'2','zufriedenheitstyp_id'=>null)));
			$this->set('zeigtAlle','nein');
		}else{
			$this->data=$this->Vorgang->find('all', array('conditions'=>array('vorgangstyp_id'=>'2')));
			$this->set('zeigtAlle','ja');
		}

		//Alle Vorgänge um Kalkulationen anreichern
		for($count=0;$count<count($this->data);$count++){
			$vorgang= $this->data[$count];
			$vorgang['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($vorgang['Vorgang']);
			$this->data[$count]=$vorgang;
		}

		//Ein paar Default-Sachen übergeben
		$this->setDefaultData();
	}

	// Fred
	public function indexRechnungen($alle=null)
	{
		//Liste von Vorgängen aufbauen
		if (empty($alle)){
			$this->data=$this->Vorgang->find('all', array('conditions'=>array('vorgangstyp_id'=>'3','zufriedenheitstyp_id'=>null)));
			$this->set('zeigtAlle','nein');
		}else{
			$this->data=$this->Vorgang->find('all', array('conditions'=>array('vorgangstyp_id'=>'3')));
			$this->set('zeigtAlle','ja');
		}

		//Alle Vorgänge um Kalkulationen anreichern
		for($count=0;$count<count($this->data);$count++){
			$vorgang= $this->data[$count];
			$vorgang['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($vorgang['Vorgang']);
			$this->data[$count]=$vorgang;
		}

		//Ein paar Default-Sachen übergeben
		$this->setDefaultData();
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

	public function SimpleCalc($flugzeugtyp, $entfernung, $sonderwunsch_netto, $zeitflug, $begleiter, $landungen){
		$this->data['Kalkulation']=$this->Kalkulationen->SimpleCalc($flugzeugtyp, $entfernung, $sonderwunsch_netto, $zeitflug, $begleiter,$landungen);
	}


    /**
     * start: ID des StartFlugplatzes
     * ziel: ID des Zielflugplatzes
     */
    public function CalcEntfernung($start = null, $ziel = null)
    {
    	if ($start == null || $ziel == null) return 0;
    	$this->Flugplatz->id=$start;
    	$startFlugplatz = $this->Flugplatz->field('geoPosition');
    	$bmStart = $this->Kalkulationen->GeografischeGradzuBogenmass($startFlugplatz);

    	$this->Flugplatz->id=$ziel;
    	$zielFlugplatz = $this->Flugplatz->field('geoPosition');
    	$bmZiel = $this->Kalkulationen->GeografischeGradzuBogenmass($zielFlugplatz);

    	return $this->Kalkulationen->CalcKugelDistanz($bmZiel,$bmStart);
    }


    public function ablegenAngebot($id=null)
	{
		if ($id == null) exit;
		$this->setDefaultData();
		if (!empty($this->data))
		{
        	if (!$this->Vorgang->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
	       		$this->redirect(array('action' => 'indexAngebote'));
		}
      	else
      	{
      		$this->Vorgang->id = $id;
        	$this->data = $this->Vorgang->read();
			$this->setDefaultData();
      	}
	}

    public function ablegenRechnung($id=null)
	{
		if ($id == null) exit;
		$this->setDefaultData();
		if (!empty($this->data))
		{
        	if (!$this->Vorgang->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
	       		$this->redirect(array('action' => 'indexRechnungen'));
		}
      	else
      	{
      		$this->Vorgang->id = $id;
        	$this->data = $this->Vorgang->read();
			$this->setDefaultData();
      	}
	}

    public function addAngebot()
	{
		$this->pageTitle = 'Angebot erstellen';
		$this->setDefaultData();
		if (!empty($this->data))
		{
			//Standard-Daten setzen.
			$this->data['Vorgang']['vorgangstyp_id']=1; //Typ ist angebot
			$this->data['Vorgang']['datum']=date("d.m.Y",time()); //heutiges Datum
			$this->data['Vorgang']['sonderwunsch_netto']=str_replace(',','.',$this->data['Vorgang']['sonderwunsch_netto']);
			$this->data['Vorgang']['vorgangstyp_id']=1; //Typ ist angebot
            if ($this->data['Vorgang']['AnzahlFlugbegleiter']==null)
            $this->data['Vorgang']['AnzahlFlugbegleiter']=0;

			//Kalkulation durchführen
            $this->data['Vorgang']['reisezeit']=1.0;
			$this->data['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($this->data['Vorgang']);
			$this->data['Vorgang']['reisezeit'] = $this->data['Vorgang']['Kalkulation']['reisezeit'];

			//Speichern des Angebots
			if (!$this->Vorgang->save($this->data)) {
                $this->Session->setFlash('Fehler beim Speichern',array('action' => 'indexAngebote'));
			} else {
                //var_dump($this->data['Vorgang']);
				$this->redirect(array('action' => 'indexAngebote'));
			}
        }
	}

	public function addVertrag(){
		if (empty($this->data)){
			$this->setDefaultData();
			$this->data=$this->Vorgang->find('all', array('conditions'=>array('vorgangstyp_id'=>'1','zufriedenheitstyp_id'=>null)));

			//Alle Vorgänge um Kalkulationen anreichern
			for($count=0;$count<count($this->data);$count++){
				$vorgang= $this->data[$count];
				$vorgang['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($vorgang['Vorgang']);
				$this->data[$count]=$vorgang;
			}

			$liste = array();
			foreach($this->data as $angebot){
				$firma = $angebot['Vorgang']['Adresse']['Adresse']['firma'];
				$datum = $angebot['Vorgang']['datum'];
				$id = $angebot['Vorgang']['id'];
				$liste[$id]='ANG-'.$id.' vom '.$datum . ' für ' . $firma;
			}
			$this->set('angebotsliste', $liste);
		} else {
			$this->Vorgang->id = $this->data['Vorgang']['RECORD'];
			$record = $this->Vorgang->read();
			$record['Vorgang']['vorgangstyp_id']=2;
			$record['Vorgang']['datum']=date("d.m.Y",time()); //heutiges Datum

			//Vorgang ist gewandelt, nun wird die nächste Seite aufgerufen
			if (!$this->Vorgang->save($record)) {
                $this->Session->setFlash('Fehler beim Speichern');
			} else {
				$this->redirect(array('action' => 'indexVertraege'));
			}
		}
	}

	//Fred 04.06.09
	public function addRechnung(){
		if (empty($this->data)){
			$this->setDefaultData();
			$this->data=$this->Vorgang->find('all', array('conditions'=>array('vorgangstyp_id'=>'2','zufriedenheitstyp_id'=>null)));

			//Alle Vorgänge um Kalkulationen anreichern
			for($count=0;$count<count($this->data);$count++){
				$vorgang= $this->data[$count];
				$vorgang['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($vorgang['Vorgang']);
				$this->data[$count]=$vorgang;
			}

			$liste = array();
			foreach($this->data as $vertrag){
				$firma = $vertrag['Vorgang']['Adresse']['Adresse']['firma'];
				$datum = $vertrag['Vorgang']['datum'];
				$id = $vertrag['Vorgang']['id'];
				$liste[$id]='VER-'.$id.' vom '.$datum . ' für ' . $firma;
			}
			$this->set('vertragsliste', $liste);
		} else {
			//Neuen Vorgangstypen setzen
			$this->Vorgang->id = $this->data['Vorgang']['RECORD'];
			$record = $this->Vorgang->read();
			$record['Vorgang']['vorgangstyp_id']=3;
			$record['Vorgang']['datum']=date("d.m.Y",time()); //heutiges Datum

			//Speichern
			if (!$this->Vorgang->save($record)) {
				//Speichern hat nicht geklappt
                $this->Session->setFlash('Fehler beim Speichern');
			} else {
				//Vorgang ist gewandelt, nun wird die nächste Seite aufgerufen
				if ($record['Vorgang']['zeitcharter']==1){
					$this->redirect(array('action' => 'reisezeitSpeichern/'.$this->data['Vorgang']['RECORD']));
				} else {
					$this->redirect(array('action' => 'indexRechnungen'));
				}
			}
		}
	}


	public function angebot($id = null){
		$this->setDefaultData();
		if ($id != null)
        {
        	$this->Vorgang->id = $id;
        	$this->data=$this->Vorgang->read();
			$this->data['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($this->data['Vorgang']);
			if ($this->RequestHandler->prefers('xml')) {
				header('Content-Disposition: attachment; filename="Angebot-' . $id .'.xml"');
				header('content-type: text/xml');
			} else if ($this->RequestHandler->prefers('pdf')) {
				header('Content-Disposition: attachment; filename="Angebot-' . $id .'.pdf"');
				header("Content-type: application/pdf");
				//header('content-type: text/html');
			}
        }
	}

	public function vertrag($id = null){
		$this->setDefaultData();
		if ($id != null)
        {
        	$this->Vorgang->id = $id;
        	$this->data=$this->Vorgang->read();
			$this->data['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($this->data['Vorgang']);
			if ($this->RequestHandler->prefers('xml')) {
				header('Content-Disposition: attachment; filename="Vertrag-' . $id .'.xml"');
				header('content-type: text/xml');
			} else if ($this->RequestHandler->prefers('pdf')) {
				header('Content-Disposition: attachment; filename="Vertrag-' . $id .'.pdf"');
				header("Content-type: application/pdf");
			}
        }
   	}

	// Fred 04.06.09
	public function rechnung($id = null){
		$this->setDefaultData();
		if ($id != null)
        {
        	$this->Vorgang->id = $id;
        	$this->data=$this->Vorgang->read();
			$this->data['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($this->data['Vorgang']);
			if ($this->RequestHandler->prefers('xml')) {
				header('Content-Disposition: attachment; filename="Rechnung-' . $id .'.xml"');
				header('content-type: text/xml');
			} else if ($this->RequestHandler->prefers('pdf')) {
				header('Content-Disposition: attachment; filename="Rechnung-' . $id .'.pdf"');
				header("Content-type: application/pdf");
				//header('content-type: text/html');
			}
        }
  	}


	public function reisezeitSpeichern($id = null){
		if (!empty($this->data))
		{
      		$this->Vorgang->id = $this->data['Vorgang']['id'];
        	$vorgang = $this->Vorgang->Read();
        	$vorgang['Vorgang']['reisezeit']=str_replace(',','.',$this->data['Vorgang']['reisezeit']);
			$vorgang['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($vorgang['Vorgang']);

        	if (!$this->Vorgang->save($vorgang))
                $this->Session->setFlash('Fehler beim Speichern');
            else
	       		$this->redirect(array('action' => 'indexRechnungen'));
		}
      	else
      	{
      		$this->Vorgang->id = $id;
        	$this->data = $this->Vorgang->Read();
			$this->setDefaultData();
      	}
	}


	public function bezahlen($id = null){
		if ($id == null) $this->Session->setFlash('Fehlerhafter Aufruf der Funktion','index');
		if (!empty($this->data))
		{
			$this->data['Vorgang']['brutto_ist']=str_replace(',','.',$this->data['Vorgang']['brutto_ist']);

        	if (!$this->Vorgang->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
	       		$this->redirect(array('action' => 'indexRechnungen'));
		}
      	else
      	{
      		$this->Vorgang->id = $id;
        	$this->data = $this->Vorgang->Read();
			$this->data['Vorgang'] = $this->Kalkulationen->KalkuliereVorgang($this->data['Vorgang']);
			$this->setDefaultData();
      	}
	}
}
?>