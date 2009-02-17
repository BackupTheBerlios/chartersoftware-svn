<?php
class EntfernungController extends AppController {
	var $name = 'Entfernung';
	
    public function index() 
	{        
        $this->set('entfernung', $this->Entfernung->find('all'));    
	}
}
?>