<?php

/**
 * Controller fŸr 
 * 
 * @author A. Behrens
 * 
 * 
 * Grundprinzip: Jede Methode ist eine Action und kann von au§en aufgerufen
 * werden. Etwa "/cake/index.php/flugplatzs/edit". 
 * 
 * Dabei kann es sein, dass ein Parameter Ÿbergeben wird oder auch nicht.
 * 
 */
class FlugplatzsController extends AppController 
{
	var $name = 'Flugplatzs';
	var $helpers = array('Form'); //Bedeutet: Fuer diesen Controller werden HTML-Formulare benoetigt.
	
	/**Anzeigen einer Liste*/
    public function index() 
	{   
		$alle = $this->Flugplatz->find('all');
		$this->set('flugplatzs',$alle);     
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
	
	/**Aufruf der ZufŸgenseite*/
	public function add() 
	{   
		if (!empty($this->data)) 
		{
        	if ($this->Flugplatz->save($this->data)) 
        	{
                $this->flash('gespeichert', '/flugplatzs');
        	} 
        	else
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	} 
        }     
	}


	/**Lšschen */
	function delete($id) 
	{
		if (!empty($id))
		{
            $this->Flugplatz->del($id);
            $this->flash('geloescht', '/flugplatzs');
		}
	}


	/**Editieren*/
	function edit($id = null) 
	{
		if (!empty($this->data)) 
		{
        	if ($this->Flugplatz->save($this->data)) 
        	{
                $this->flash('geaendert', '/flugplatzs');
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