<?php

/**
 * Controller für Zeitzonen
 *
 * @author A. Behrens
 *
 *
 * Grundprinzip: Jede Methode ist eine Action und kann von au�en aufgerufen
 * werden. Etwa "/cake/index.php/flugzeugherstellers/edit".
 *
 * Dabei kann es sein, dass ein Parameter �bergeben wird oder auch nicht.
 *
 */
class FlugzeugherstellerController extends AppController
{
	public $name = 'Flugzeughersteller';

	/**Anzeigen einer Liste*/
    public function index()
	{
		$alle = $this->Flugzeughersteller->findAll();
		$this->set('flugzeughersteller',$alle);
        //$this->render('index','ajax');
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
		  $this->Flugzeughersteller->id = $id;
		  $this->set('flugzeughersteller', $this->Flugzeughersteller->read());
        }
        //$this->render('layout file', 'ajax');
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		if (!empty($this->data))
		{
        	if ($this->Flugzeughersteller->save($this->data))
        	{
                $this->flash('gespeichert', '/flugzeughersteller');
        	}
        	else
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	}
        }
	}


	/**L�schen */
	function delete($id)
	{
		if (!empty($id))
		{
            $this->Flugzeughersteller->del($id);
            $this->flash('geloescht', '/flugzeughersteller');
		}
	}


	/**Editieren*/
	function edit($id = null)
	{
		if (!empty($this->data))
		{
        	if ($this->Flugzeughersteller->save($this->data))
        	{
                $this->flash('geaendert', '/flugzeughersteller');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern');
            }
		}
      	else
      	{
        	$this->Flugzeughersteller->id = $id;
        	$this->data = $this->Flugzeughersteller->read();
        	$this->set('id',$id);
      	}
	}
}
?>