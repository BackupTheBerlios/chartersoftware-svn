<?php

/**
 * Controller 
 * 
 * @author A. Behrens
 * 
 * 
 * Grundprinzip: Jede Methode ist eine Action und kann von au�en aufgerufen
 * werden. Etwa "/cake/index.php/flugzeugtyps/edit". 
 * 
 * Dabei kann es sein, dass ein Parameter �bergeben wird oder auch nicht.
 * 
 */
class FlugzeugeController extends AppController 
{
	var $name = 'Flugzeug';
    //var $components = array('Index'); 
	
	/**Anzeigen einer Liste*/
    public function index() 
	{
		$alle = $this->Flugzeug->findAll();
		$this->set('flugzeuge',$alle);     
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
		  $this->Flugzeug->id = $id;        
		  $this->set('flugzeug', $this->Flugzeug->read());
        }    
	}
	
	/**Aufruf der Zuf�genseite*/
	public function add() 
	{   
		if (!empty($this->data)) 
		{
        	if ($this->Flugzeug->save($this->data)) 
        	{
                $this->flash('gespeichert', '/flugzeuge');
        	} 
        	else
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	} 
        }     
	}


	/**Löschen */
	function delete($id) 
	{
		if (!empty($id))
		{
            $this->Flugzeug->del($id);
            $this->flash('geloescht', '/flugzeuge');
		}
	}


	/**Editieren*/
	function edit($id = null) 
	{
		if (!empty($this->data)) 
		{
        	if ($this->Flugzeug->save($this->data)) 
        	{
                $this->flash('geaendert', '/flugzeuge');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern');
            } 
		}
      	else 
      	{
        	$this->Flugzeug->id = $id;
        	$this->data = $this->Flugzeug->read();
        	$this->set('id',$id);
      	}
	}
}
?>