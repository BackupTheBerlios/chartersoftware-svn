<?php
/*
 * Created on 03.03.2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class AppController extends Controller {
    public $helpers = array('Form','Html','Ajax','Javascript'); 
    public $components = array( 'RequestHandler','Kalkulationen' );
    
    
    public function index()
	{
		$currentObject =& ClassRegistry::getObject($this->modelClass);
		$this->data=$currentObject->find('all');
	}
    
}



?>
