<?php

/**
 * Controller fŸr Zeitzonen
 * 
 * @author A. Behrens
 * 
 * 
 * Grundprinzip: Jede Methode ist eine Action und kann von au§en aufgerufen
 * werden. Etwa "/cake/index.php/zeitzones/edit". 
 * 
 * Dabei kann es sein, dass ein Parameter Ÿbergeben wird oder auch nicht.
 * 
 */
class ZeitzonesController extends AppController 
{
	var $name = 'Zeitzones';
	var $helpers = array('Form'); //Bedeutet: Fuer diesen Controller werden HTML-Formulare benoetigt.
	
	/**Anzeigen einer Liste von Zeitzonen*/
    public function index() 
	{   
		$alle = $this->Zeitzone->findAll();
		$this->set('zeitzones',$alle);     
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
	
	/**Aufruf der ZufŸgenseite einer Zeitzone*/
	public function add() 
	{   
		if (!empty($this->data)) 
		{
        	if ($this->Zeitzone->save($this->data)) 
        	{
                $this->flash('gespeichert', '/zeitzones');
        	} 
        	else
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	} 
        }     
	}


	/**Lšschen einer Zeitzone*/
	function delete($id) 
	{
		if (!empty($id))
		{
            $this->Zeitzone->del($id);
            $this->flash('geloescht', '/zeitzones');
		}
	}


	/**Editieren einer Zeitzone*/
	function edit($id = null) 
	{
		if (!empty($this->data)) 
		{
        	if ($this->Zeitzone->save($this->data)) 
        	{
                $this->flash('geaendert', '/zeitzones');
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