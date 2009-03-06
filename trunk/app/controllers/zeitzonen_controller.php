<?php

/**
 * Controller f�r Zeitzonen
 * 
 * @author A. Behrens
 * 
 * 
 * Grundprinzip: Jede Methode ist eine Action und kann von au�en aufgerufen
 * werden. Etwa "/cake/index.php/zeitzonen/edit". 
 * 
 * Dabei kann es sein, dass ein Parameter �bergeben wird oder auch nicht.
 * 
 */
class ZeitzonenController extends AppController 
{
	var $name = 'Zeitzone';
	
	/**Anzeigen einer Liste von Zeitzonen*/
    public function index() 
	{   
		$alle = $this->Zeitzone->findAll();
		$this->set('zeitzonen',$alle);     
	}

    
	/**Anzeigen einer Zeitzone
     * 
     * @param id ist optional, wenn gesetzt, wird eine einzelne Zeitzone miteben
     * der id angezeigt
     * */
	public function view($id = null) 
	{  
        if ($id != null) 
        {      
		  $this->Zeitzone->id = $id;        
		  $this->set('zeitzone', $this->Zeitzone->read());
        }    
	}
	
	/**Aufruf der Zuf�genseite einer Zeitzone*/
	public function add() 
	{   
		if (!empty($this->data)) 
		{
        	if ($this->Zeitzone->save($this->data)) 
        	{
                $this->flash('gespeichert', '/zeitzonen');
        	} 
        	else
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	} 
        }     
	}


	/**L�schen einer Zeitzone*/
	function delete($id) 
	{
		if (!empty($id))
		{
            $this->Zeitzone->del($id);
            $this->flash('gelöscht', '/zeitzonen');
		}
	}


	/**Editieren einer Zeitzone*/
	function edit($id = null) 
	{
		if (!empty($this->data)) 
		{
        	if ($this->Zeitzone->save($this->data)) 
        	{
                $this->flash('geaendert', '/zeitzonen');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern');
            } 
		}
      	else 
      	{
        	$this->Zeitzone->id = $id;
        	$this->data = $this->Zeitzone->read();
        	$this->set('id',$id);
      	}
	}
}
?>