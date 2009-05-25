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
class FlugplaetzeController extends AppController
{
	public $name = 'Flugplatz';
    public $uses = array('Flugplatz');



	/**Anzeigen einer Liste*/
    public function index()
	{
		$alle = $this->Flugplatz->find('all');
		$this->set('flugplaetze',$alle);
        $this->set('zeitzonenliste', timezone_identifiers_list());
	}


	/**Anzeigen einer
     *
     * @param id ist optional, wenn gesetzt, wird eine einzelne Typ mit eben
     * der id angezeigt
     * */
	public function view($id = null)
	{
        $this->set('zeitzonenliste', timezone_identifiers_list());
        if ($id != null)
        {
        	$this->set('id',$id);
        	$this->Flugplatz->id = $id;
        	$this->data=$this->Flugplatz->read();
        }
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
        $this->set('zeitzonenliste', timezone_identifiers_list());
		if (!empty($this->data))
		{
        	if ($this->Flugplatz->save($this->data))
        	{
                $this->flash('gespeichert', '/flugplaetze');
        	}
        	else
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	}
        }
	}


	/**löschen */
	function delete($id)
	{
		if (!empty($id))
		{
            $this->Flugplatz->del($id);
            $this->flash('geloescht', '/flugplaetze');
		}
	}


	/**Editieren*/
	function edit($id = null)
	{
        $this->set('zeitzonenliste', timezone_identifiers_list());
		if (!empty($this->data))
		{
        	if ($this->Flugplatz->save($this->data))
        	{
                $this->flash('geaendert', '/flugplaetze');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern');
            }
		}
      	else
      	{
        	$this->Flugplatz->id = $id;
        	$this->data = $this->Flugplatz->read();
        	$this->set('id',$id);
      	}
	}
}
?>