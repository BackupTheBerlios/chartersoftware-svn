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

	/**Anzeigen einer Liste*/
    public function index()
	{
		$alle = $this->Flugzeugtyp->findAll();
		$this->set('flugzeugtypen',$alle);
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
          $this->Flugzeugtyp->id = $id;
          $flugzeugtyp = $this->Flugzeugtyp->read();
          $this->set('flugzeugtyp', $flugzeugtyp);
        }
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
        $this->set('herstellerliste', $this->Flugzeughersteller->find('list'));

		if (!empty($this->data))
		{
        	if ($this->Flugzeugtyp->save($this->data))
        	{
                $this->flash('gespeichert', '/flugzeugtyp');
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
            $this->Flugzeugtyp->del($id);
            $this->flash('geloescht', '/flugzeugtyp');
		}
	}


	/**Editieren*/
	function edit($id = null)
	{
        $this->set('herstellerliste', $this->Flugzeughersteller->find('list'));
		if (!empty($this->data))
		{
        	if ($this->Flugzeugtyp->save($this->data))
        	{
                $this->flash('geaendert', '/flugzeugtyp');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern');
            }
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