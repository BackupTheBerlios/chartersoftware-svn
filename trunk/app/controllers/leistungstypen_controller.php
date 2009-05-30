<?php


/**
 * Controller für
 *
 * @author A. Behrens
 *
 *
 * Grundprinzip: Jede Methode ist eine Action und kann von au�en aufgerufen
 * werden. Etwa "/cake/index.php/flugplatzs/edit".
 *
 * Dabei kann es sein, dass ein Parameter �bergeben wird oder auch nicht.
 *
 */
class LeistungstypenController extends AppController
{
	public $name = 'Leistungstyp';
    public $uses = array('Leistungstyp');


	/**Anzeigen einer
     *
     * @param id ist optional, wenn gesetzt, wird eine einzelne Typ mit eben
     * der id angezeigt
     * */
	public function view($id = null)
	{
        if ($id != null)
        {
        	$this->Leistungstyp->id = $id;
        	$this->set('id',$id);
        	$this->data=$this->Leistungstyp->read();
        }
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		if (!empty($this->data))
		{
        	if (!$this->Leistungstyp->save($this->data))
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	}
			$this->redirect(array('action' => 'index'));
        }
        
	}

	/**Editieren*/
	function edit($id = null)
	{
		if (!empty($this->data))
		{
        	if (!$this->Leistungstyp->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
	       		$this->redirect(array('action' => 'index'));
		}
      	else
      	{
        	$this->Leistungstyp->id = $id;
        	$this->data = $this->Leistungstyp->read();
      	}
	}
}
?>