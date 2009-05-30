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



	/**Editieren*/
	function edit($id = null)
	{
		if (!empty($this->data))
		{
        	if ($this->Mehrwertsteuersatz->save($this->data))
        	{
        		$this->redirect(array('action' => 'index'));
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