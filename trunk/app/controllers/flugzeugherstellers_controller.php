<?php

/**
 * Controller fŸr Zeitzonen
 * 
 * @author A. Behrens
 * 
 * 
 * Grundprinzip: Jede Methode ist eine Action und kann von au§en aufgerufen
 * werden. Etwa "/cake/index.php/flugzeugherstellers/edit". 
 * 
 * Dabei kann es sein, dass ein Parameter Ÿbergeben wird oder auch nicht.
 * 
 */
class FlugzeugherstellersController extends AppController 
{
	var $name = 'Flugzeugherstellers';
	var $helpers = array('Form'); //Bedeutet: Fuer diesen Controller werden HTML-Formulare benoetigt.
	
	/**Anzeigen einer Liste*/
    public function index() 
	{   
		$alle = $this->Flugzeughersteller->findAll();
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
		  $this->Flugzeughersteller->id = $id;        
		  $this->set('flugzeughersteller', $this->Flugzeughersteller->read());
        }    
	}
	
	/**Aufruf der ZufŸgenseite*/
	public function add() 
	{   
		if (!empty($this->data)) 
		{
        	if ($this->Flugzeughersteller->save($this->data)) 
        	{
                $this->flash('gespeichert', '/flugzeugherstellers');
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
            $this->Flugzeughersteller->del($id);
            $this->flash('geloescht', '/flugzeugherstellers');
		}
	}


	/**Editieren*/
	function edit($id = null) 
	{
		if (!empty($this->data)) 
		{
        	if ($this->Flugzeughersteller->save($this->data)) 
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
        	$this->Flugzeughersteller->id = $id;
        	$this->data = $this->Flugzeughersteller->read();
        	$this->set('id',$id);
      	}
	}
}
?>