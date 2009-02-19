<?php

/**
 * Controller 
 * 
 * @author A. Behrens
 * 
 * 
 * Grundprinzip: Jede Methode ist eine Action und kann von au§en aufgerufen
 * werden. Etwa "/cake/index.php/flugzeugtyps/edit". 
 * 
 * Dabei kann es sein, dass ein Parameter Ÿbergeben wird oder auch nicht.
 * 
 */
class FlugzeugTypsController extends AppController 
{
	var $name = 'FlugzeugTypsController';
	var $helpers = array('Form'); //Bedeutet: Fuer diesen Controller werden HTML-Formulare benoetigt.
	
	/**Anzeigen einer Liste*/
    public function index() 
	{   
		$alle = $this->FlugzeugTyp->findAll();
		$this->set('flugzeugtyps',$alle);     
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
		  $this->FlugzeugTyp->id = $id;        
		  $this->set('zeitzone', $this->FlugzeugTyp->read());
        }    
	}
	
	/**Aufruf der ZufŸgenseite*/
	public function add() 
	{   
		if (!empty($this->data)) 
		{
        	if ($this->FlugzeugTyp->save($this->data)) 
        	{
                $this->flash('gespeichert', '/flugzeugtyps');
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
            $this->FlugzeugTyp->del($id);
            $this->flash('geloescht', '/flugzeugtyps');
		}
	}


	/**Editieren*/
	function edit($id = null) 
	{
		if (!empty($this->data)) 
		{
        	if ($this->FlugzeugTyp->save($this->data)) 
        	{
                $this->flash('geaendert', '/flugzeugtyps');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern');
            } 
		}
      	else 
      	{
        	$this->FlugzeugTyp->id = $id;
        	$this->data = $this->FlugzeugTyp->read();
        	$this->set('id',$id);
      	}
	}
}
?>