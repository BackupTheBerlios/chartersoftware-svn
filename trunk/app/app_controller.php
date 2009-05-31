<?php
/*
 * Created on 03.03.2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

class AppController extends Controller {
    public $helpers = array('Form','Html','Ajax','Javascript','Rentform'); 
    public $components = array( 'RequestHandler','Kalkulationen');
    
    
    public function index()
	{
		$currentObject =& ClassRegistry::getObject($this->modelClass);
		$this->data=$currentObject->find('all');
	}
	
	
    
    
   	function delete($id)
	{
		if (!empty($id))
		{
			$currentObject =& ClassRegistry::getObject($this->modelClass);
			$currentObject->del($id);
			$this->redirect(array('action' => 'index'));
		}
	}
	
	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		if (!empty($this->data))
		{
			$currentObject =& ClassRegistry::getObject($this->modelClass);
        	if (!$currentObject->save($this->data))
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	} else {
				$this->redirect(array('action' => 'index'));
        	}
        }
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
			$currentObject =& ClassRegistry::getObject($this->modelClass);
        	$currentObject->id = $id;
        	$this->data=$currentObject->read();
        }
	}
	
    
    
	/**Editieren*/
	function edit($id = null)
	{
		$currentObject =& ClassRegistry::getObject($this->modelClass);
		if (!empty($this->data))
		{
        	if (!$currentObject->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
	       		$this->redirect(array('action' => 'index'));
		}
      	else
      	{
      		$currentObject->id = $id;
        	$this->data = $currentObject->read();
      	}
	}
    
}



?>
