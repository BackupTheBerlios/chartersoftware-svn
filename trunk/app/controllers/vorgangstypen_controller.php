<?php

/**
 * Controller für
 *
 * @author A. Behrens
 *
 *
 *
 */
class VorgangstypenController extends AppController
{
	public $name = 'Vorgangstyp';


	/**Anzeigen einer
     *
     * @param id ist optional, wenn gesetzt, wird eine einzelne Typ mit eben
     * der id angezeigt
     * */
	public function view($id = null)
	{
        if ($id != null)
        {
		  $this->Vorgangstyp->id = $id;
		  $this->set('vorgangstyp', $this->Vorgangstyp->read());
        }
	}




	/**Editieren*/
	function edit($id = null)
	{
		if (!empty($this->data))
		{
        	if ($this->Vorgangstyp->save($this->data))
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
        	$this->Vorgangstyp->id = $id;
        	$this->data = $this->Vorgangstyp->read();
        	$this->set('id',$id);
      	}
	}
}
?>