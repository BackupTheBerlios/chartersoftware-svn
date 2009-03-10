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
class FlugplaetzeController extends AppController 
{
	var $name = 'Flugplatz';
    var $uses = array('Flugplatz','Zeitzone');
	
	/**Anzeigen einer Liste*/
    public function index() 
	{   
		$alle = $this->Flugplatz->find('all');
		$this->set('flugplaetze',$alle);     
	}

    
	/**Anzeigen einer
     * 
     * @param id ist optional, wenn gesetzt, wird eine einzelne Typ mit eben
     * der id angezeigt
     * */
	public function view($id = null) 
	{  
        if ($id != null) 
        {      
		  $this->Flugplatz->id = $id;        
		  $this->set('flugplatz', $this->Flugplatz->read());
        }    
	}
	
	/**Aufruf der Zuf�genseite*/
	public function add() 
	{   
        $this->set('zeitzonenliste', $this->Zeitzone->find('list'));//auswahlbox anzeigen
        
		if (!empty($this->data)) 
		{
        	if ($this->Flugplatz->save($this->data)) 
        	{
                $this->flash('gespeichert', '/flugplaetze');
        	} 
        	else
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	} 
        }     
	}


	/**löschen */
	function delete($id) 
	{
		if (!empty($id))
		{
            $this->Flugplatz->del($id);
            $this->flash('geloescht', '/flugplaetze');
		}
	}


	/**Editieren*/
	function edit($id = null) 
	{
        $this->set('zeitzonenliste', $this->Zeitzone->find('list'));//auswahlbox anzeigen
		if (!empty($this->data)) 
		{
        	if ($this->Flugplatz->save($this->data)) 
        	{
                $this->flash('geaendert', '/flugplaetze');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern');
            } 
		}
      	else 
      	{
        	$this->Flugplatz->id = $id;
        	$this->data = $this->Flugplatz->read();
        	$this->set('id',$id);
      	}
	}
}
?>