<?php

App::import('Xml');


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
class AdressenController extends AppController
{
	public $name = 'Adresse';
    public $uses = array('Adresse');

	/**Anzeigen einer Liste*/
    public function index()
	{
		$alle = $this->Adresse->find('all');
		$this->set('adressen',$alle);
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
        	$this->Adresse->id = $id;
        	$this->set('id',$id);
        	$this->data=$this->Adresse->read();
        }
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		if (!empty($this->data))
		{
        	if (!$this->Adresse->save($this->data))
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	}else{
        		$this->flash('gespeichert', '/adressen');
        	}
        }
        
	}


	/**löschen */
	function delete($id)
	{
		if (!empty($id))
		{
            $this->Adresse->del($id);
		}
	}


	/**Editieren*/
	function edit($id = null)
	{
		if (!empty($this->data))
		{
        	if (!$this->Adresse->save($this->data))
            {
                $this->Session->setFlash('Fehler beim Speichern');
            }
            else
            {
            	$this->flash('gespeichert', '/adressen');
            }
		}
      	else
      	{
        	$this->Adresse->id = $id;
        	$this->data = $this->Adresse->read();
        	$this->set('id',$id);
      	}
      	
      	
	}
}
?>