<?php

/**
 * Controller f�r Zeitzonen
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
class FlugzeugHerstellersController extends AppController 
{
	var $name = 'FlugzeugHerstellersController';
	var $helpers = array('Form'); //Bedeutet: Fuer diesen Controller werden HTML-Formulare benoetigt.
	
	/**Anzeigen einer Liste*/
    public function index() 
	{   
		$alle = $this->FlugzeugHersteller->findAll();
		$this->set('flugzeugherstellers',$alle);     
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
		  $this->FlugzeugHersteller->id = $id;        
		  $this->set('zeitzone', $this->FlugzeugHersteller->read());
        }    
	}
	
	/**Aufruf der Zuf�genseite*/
	public function add() 
	{   
		if (!empty($this->data)) 
		{
        	if ($this->FlugzeugHersteller->save($this->data)) 
        	{
                $this->flash('gespeichert', '/flugzeugherstellers');
        	} 
        	else
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	} 
        }     
	}


	/**L�schen */
	function delete($id) 
	{
		if (!empty($id))
		{
            $this->FlugzeugHersteller->del($id);
            $this->flash('geloescht', '/flugzeugherstellers');
		}
	}


	/**Editieren*/
	function edit($id = null) 
	{
		if (!empty($this->data)) 
		{
        	if ($this->FlugzeugHersteller->save($this->data)) 
        	{
                $this->flash('geaendert', '/flugzeugherstellers');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern');
            } 
		}
      	else 
      	{
        	$this->FlugzeugHersteller->id = $id;
        	$this->data = $this->FlugzeugHersteller->read();
        	$this->set('id',$id);
      	}
	}
}
?>