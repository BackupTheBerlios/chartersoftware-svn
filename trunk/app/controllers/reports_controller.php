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
class ReportsController extends AppController
{
	public $name = 'Report';
    public $uses = array('Report');

	/**Anzeigen einer Liste*/
    public function index()
	{
		$this->data=$this->Report->find('all');
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
        	$this->Report->id = $id;
        	$this->data=$this->Report->read();
        }
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		if (!empty($this->data))
		{
        	if (!$this->Report->save($this->data))
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	}else{
        		$this->flash('gespeichert', '/reports');
        	}
        }
        
	}


	/**löschen */
	function delete($id)
	{
		if (!empty($id))
		{
            $this->Report->del($id);
		}
	}


	/**Editieren*/
	function edit($id = null)
	{
		if (!empty($this->data))
		{
        	if (!$this->Report->save($this->data))
            {
                $this->Session->setFlash('Fehler beim Speichern');
            }
            else
            {
            	$this->flash('gespeichert', '/reports');
            }
		}
      	else
      	{
        	$this->Report->id = $id;
        	$this->data = $this->Adresse->read();
      	}
      	
      	
	}
}
?>