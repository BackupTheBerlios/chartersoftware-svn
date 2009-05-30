<?php

/**
 * Controller
 *
 * @author A. Behrens
 *
 *
 * Grundprinzip: Jede Methode ist eine Action und kann von au�en aufgerufen
 * werden. Etwa "/cake/index.php/flugzeugtyps/edit".
 *
 * Dabei kann es sein, dass ein Parameter �bergeben wird oder auch nicht.
 *
 */
class FlugzeugtypenController extends AppController
{
	public $name = 'Flugzeugtyp';
    public $uses = array('Flugzeugtyp','Flugzeug','Flugzeughersteller');


	/**Anzeigen einer
     *
     * @param id ist optional, wenn gesetzt, wird eine einzelne Typ mit eben
     * der id angezeigt
     * */
	public function view($id = null)
	{
        if ($id != null)
        {
        	$this->Flugzeugtyp->id = $id;
        	$this->set('id',$id);
        	$this->data=$this->Flugzeugtyp->read();
        }
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
        $this->set('herstellerliste', $this->Flugzeughersteller->find('list'));

		if (!empty($this->data))
		{
        	if (!$this->Flugzeugtyp->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
        		$this->redirect(array('action' => 'index'));
        }
	}


	/**Editieren*/
	function edit($id = null)
	{
        $this->set('herstellerliste', $this->Flugzeughersteller->find('list'));
		if (!empty($this->data))
		{
        	if (!$this->Flugzeugtyp->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
        		$this->redirect(array('action' => 'index'));
		}
      	else
      	{
        	$this->Flugzeugtyp->id = $id;
        	$this->data = $this->Flugzeugtyp->read();
        	$this->set('id',$id);
      	}
	}
}
?>