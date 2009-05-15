<?php

/**
 * Controller für
 *
 * @author A. Behrens
 *
 *
 *
 */
class MehrwertsteuersaetzeController extends AppController
{
	public $name = 'Mehrwertsteuersatz';
    public $helpers = array('Html','Ajax','Javascript','Form');
    public $components = array( 'RequestHandler' );

	/**Anzeigen einer Liste*/
    public function index()
	{
		$alle = $this->Mehrwertsteuersatz->find('all');
		$this->set('mehrwertsteuersaetze',$alle);
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
		  $this->Mehrwertsteuersatz->id = $id;
		  $this->set('mehrwertsteuersatz', $this->Mehrwertsteuersatz->read());
        }
	}

	/**Aufruf der Zufügenseite*/
	public function add()
	{
		if (!empty($this->data))
		{
        	if ($this->Mehrwertsteuersatz->save($this->data))
        	{
                $this->flash('gespeichert', '/mehrwertsteuersaetze');
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
            $this->Mehrwertsteuersatz->del($id);
            $this->flash('geloescht', '/mehrwertsteuersaetze');
		}
	}


	/**Editieren*/
	function edit($id = null)
	{
		if (!empty($this->data))
		{
        	if ($this->Mehrwertsteuersatz->save($this->data))
        	{
                $this->flash('geändert', '/mehrwertsteuersaetze');
        	}
            else
            {
                $this->Session->setFlash('Fehler beim Speichern');
            }
		}
      	else
      	{
        	$this->Mehrwertsteuersatz->id = $id;
        	$this->data = $this->Mehrwertsteuersatz->read();
        	$this->set('id',$id);
      	}
	}
}
?>