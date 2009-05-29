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
class ZufriedenheitstypenController extends AppController
{
	public $name = 'Zufriedenheitstyp';
    public $uses = array('Zufriedenheitstyp');

	/**Anzeigen einer Liste*/
    public function index()
	{
		$this->data=$this->Zufriedenheitstyp->find('all');
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
        	$this->Zufriedenheitstyp->id = $id;
        	$this->set('id',$id);
        	$this->data=$this->Zufriedenheitstyp->read();
        }
	}

	/**Aufruf der Zuf�genseite*/
	public function add()
	{
		$this->set('Auswahlliste',array("Nein, ist kein Ablehnungsgrund", "Ja, ist Ablehnungsgrund" ));
		if (!empty($this->data))
		{
        	if (!$this->Zufriedenheitstyp->save($this->data))
        	{
                $this->Session->setFlash('Fehler beim Speichern');
        	}
			$this->redirect(array('action' => 'index'));
        }
        
	}


	/**löschen */
	function delete($id)
	{
		if (!empty($id))
		{
            $this->Zufriedenheitstyp->del($id);
		}
		$this->redirect(array('action' => 'index'));
	}


	/**Editieren*/
	function edit($id = null)
	{
		$this->set('Auswahlliste',array("Nein, ist kein Ablehnungsgrund", "Ja, ist Ablehnungsgrund" ));
		if (!empty($this->data))
		{
        	if (!$this->Zufriedenheitstyp->save($this->data))
                $this->Session->setFlash('Fehler beim Speichern');
            else
	       		$this->redirect(array('action' => 'index'));
		}
      	else
      	{
        	$this->Zufriedenheitstyp->id = $id;
        	$this->data = $this->Zufriedenheitstyp->read();
      	}
	}
}
?>