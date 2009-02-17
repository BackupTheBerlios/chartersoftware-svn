<?php

class ZeitzonesController extends AppController 
{
	var $name = 'Zeitzones';
	var $helpers = array('Form');
	
	/**Anzeigen einer Liste von Zeitzonen*/
    public function index() 
	{   
		$alle = $this->Zeitzone->findAll();
		$this->set('zeitzones',$alle);     
	}

    
	/**Anzeigen einer Zeitzone*/
	public function view($id = null) 
	{        
		$this->Zeitzone->id = $id;        
		$this->set('zeitzone', $this->Zeitzone->read());    
	}
	
	/**Aufruf der ZufŸgenseite einer Zeitzone*/
	public function add() 
	{   
		if (!empty($this->data)) 
		{
        	if ($this->Zeitzone->save($this->data)) 
        	{
                $this->flash('Zeitzone gespeichert', '/zeitzones');
        	} 
        	else
        	{
                $this->Session->setFlash('Fehler beim Speichern einer Zeitzone');
        	} 
        }     
	}


	/**Lšschen einer Zeitzone*/
	function delete($id) 
	{
		if (!empty($id))
		{
            $this->Zeitzone->del($id);
            $this->flash('Zeitzone geloescht', '/zeitzones');
		}
	}


	/**Editieren einer Zeitzone*/
	function edit($id = null) 
	{
		if (!empty($this->data)) 
		{
        	if ($this->Zeitzone->save($this->data)) 
        	{
                $this->flash('Zeitzone geaendert', '/zeitzones');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern einer Zeitzone');
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