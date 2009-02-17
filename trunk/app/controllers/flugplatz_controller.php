<?php
/*
 * Created on 16.02.2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
class FlugplatzController extends AppController {
	var $name = 'Flugplatz';
	
	/**Anzeigen einer Liste von FlugplŠtzen*/
    public function index() 
	{        
        $this->set('flugplaetze', $this->Flugplatz->find('all'));    
	}

    
	/**Anzeigen einer Flugplatzes*/
	public function view($id = null) 
	{        
		$this->Flugplatz->id = $id;        
		$this->set('flugplatz', $this->Flugplatz->read());    
	}
	
	/**ZufŸgen eines Flugplatzes*/
	public function add() 
	{        
		if (!empty($this->data)) 
		{            
			if ($this->Flugplatz->save($this->data)) 
			{                
				$this->flash('Der neue Flugplatz wurde zugefŸgt.', '/flugplatz');            
			}        
		}    
	}

}
?>