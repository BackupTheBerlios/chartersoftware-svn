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
class FlugplatzentfernungsController extends AppController 
{
	var $name = 'Flugplatzentfernungs';
	var $helpers = array('Form'); //Bedeutet: Fuer diesen Controller werden HTML-Formulare benoetigt.
	
	/**Anzeigen einer Liste*/
    public function index() 
	{   
		$alle = $this->Flugplatzentfernung->findAll();
		$this->set('flugplatzentfernungs',$alle);     
	}

    
	
	/**Aufruf der ZufŸgenseite*/
	public function add() 
	{   
		if (!empty($this->data)) 
		{
        	if ($this->Flugplatzentfernung->save($this->data)) 
        	{
                $this->flash('gespeichert', '/flugplatzentfernungs');
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
            $this->Flugplatzentfernung->del($id);
            $this->flash('geloescht', '/flugplatzentfernungs');
		}
	}


	/**Editieren*/
	function edit($id = null) 
	{
		if (!empty($this->data)) 
		{
        	if ($this->Flugplatzentfernung->save($this->data)) 
        	{
                $this->flash('geaendert', '/flugplatzentfernungs');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern');
            } 
		}
      	else 
      	{
        	$this->Flugplatzentfernung->id = $id;
        	$this->data = $this->Flugplatzentfernung->read();
        	$this->set('id',$id);
      	}
	}
}
?>