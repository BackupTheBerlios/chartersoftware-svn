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
}
?>